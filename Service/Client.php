<?php
/**
 * Created by Qoliber
 *
 * @category    Ari10
 * @package     Ari10_MonedaPayLib
 * @author      qoliber <info@qoliber.com>
 */

declare(strict_types=1);

namespace Ari10\MonedaPayLib\Service;

use Ari10\MonedaPayLib\Enum\Currency;
use Ari10\MonedaPayLib\Model\ConfigInterface;
use Ari10\MonedaPayLib\Model\Request\CreatePaymentRequestInterface;
use Ari10\MonedaPayLib\Model\Response\AggregatedOrderStatusResponseInterface;
use Ari10\MonedaPayLib\Model\Response\OrderInfoResponseInterface;
use Ari10\MonedaPayLib\Model\Response\ResponseInterface;
use Exception;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Exception\SuspiciousOperationException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Throwable;

class Client
{
    /** @var string */
    public const GRAPH_QL_ENDPOINT = 'https://be.%s.monedapay.io/graphql';

    /** @var string */
    public const HTTP_ENDPOINT = 'https://payment.%s.monedapay.io/ecommerce';

    /** @var string */
    public const ORDER_ID_REQUEST_KEY = 'orderId';

    /** @var string */
    public const HMAC_REQUEST_KEY = 'tiltup-hmac';

    /** @var string */
    public const AGGREGATED_STATUS_REQUEST_KEY = 'aggregatedStatus';

    /** @var int */
    private const HTTP_TIMEOUT = 2000;

    /**
     * @param \Ari10\MonedaPayLib\Model\ConfigInterface $config
     * @param \Symfony\Contracts\HttpClient\HttpClientInterface|null $httpClient
     * @param \Ari10\MonedaPayLib\Service\Encryption|null $encryption
     */
    public function __construct(
        private readonly ConfigInterface $config,
        private ?HttpClientInterface  $httpClient = null,
        private ?Encryption $encryption = null
    )
    {
    }

    public function createPaymentLink(
        CreatePaymentRequestInterface $request
    ): string
    {
        $request->setShopId($this->config->getShopId());
        $request->setMerchantId($this->config->getMerchantId());
        $request->setEcommerceType($this->config->getEcommerceType());

        return $this->getHttpEndpoint() . '?' . http_build_query(
                $request->toArray()
            );
    }

    public function getHttpEndpoint(): string
    {
        return sprintf(
            self::HTTP_ENDPOINT,
            $this->getConfig()->getEnvironment()->toString()
        );
    }

    public function getConfig(): ConfigInterface
    {
        return $this->config;
    }

    /**
     * @throws \Ari10\MonedaPayLib\Exception\ConfigurationException
     */
    public function createStatusUpdate(
        AggregatedOrderStatusResponseInterface &$responseObject
    ): AggregatedOrderStatusResponseInterface
    {
        $request = Request::createFromGlobals();
        if (!$request->isMethod(Request::METHOD_POST)) {
            throw new SuspiciousOperationException(
                'Method not allowed',
                Response::HTTP_METHOD_NOT_ALLOWED
            );
        }
        $orderId = $request->get(self::ORDER_ID_REQUEST_KEY);
        $aggregatedStatus = $request->get(self::AGGREGATED_STATUS_REQUEST_KEY);
        $requestKey = $request->headers->get(self::HMAC_REQUEST_KEY);
        $this->checkHmac($requestKey, $orderId);

        $responseObject->setOrderId($orderId);
        $responseObject->setAggregatedStatus($aggregatedStatus);

        $responseObject->provideData();

        return $responseObject;
    }

    /**
     * @throws \Ari10\MonedaPayLib\Exception\ConfigurationException
     */
    public function checkHmac(
        string                     $requestKey,
        float|bool|int|string|null $orderId
    ): void
    {
        if ($this->getEncryption()->generate($orderId) !== $requestKey) {
            throw new SuspiciousOperationException(
                'Invalid hmac',
                Response::HTTP_UNAUTHORIZED
            );
        }
    }

    public function getEncryption(): Encryption
    {
        if ($this->encryption === null) {
            $this->encryption = new Encryption($this->getConfig());
        }

        return $this->encryption;
    }

    public function sendResponse(
        ResponseInterface $responseObject
    ): JsonResponse
    {
        $response = new JsonResponse($responseObject->toArray());

        return $response->send();
    }

    /**
     * @throws \Ari10\MonedaPayLib\Exception\ConfigurationException
     */
    public function createOrderInfoRequest(
        OrderInfoResponseInterface &$responseObject
    ): OrderInfoResponseInterface
    {
        $request = Request::createFromGlobals();
        if (!$request->isMethod(Request::METHOD_GET)) {
            throw new SuspiciousOperationException(
                'Method not allowed',
                Response::HTTP_METHOD_NOT_ALLOWED
            );
        }
        $orderId = $request->get(self::ORDER_ID_REQUEST_KEY);
        $requestKey = $request->headers->get(self::HMAC_REQUEST_KEY);
        $this->checkHmac($requestKey, $orderId);

        $responseObject->setMerchantOrderId($orderId);
        $responseObject->provideData();

        return $responseObject;
    }

    public function getSupportedCurrencies(): array
    {
        try {
            $query = <<< EOD
        query GetMeta {
            metadata {
                supportedCurrencies {
                    fiat
                }
            }
        }
        EOD;

            $response = $this->getHttpClient()->request(
                Request::METHOD_POST,
                $this->getGraphQlEndpoint(),
                [
                    'json' => [
                        'query' => $query,
                        'variables' => null,
                    ],
                ]
            );

            return $response->getStatusCode() === Response::HTTP_OK
                ? $response->toArray() : throw new Exception();
        } catch (Throwable $e) {
            return Currency::toArray();
        }
    }

    private function getHttpClient(): HttpClientInterface
    {
        if ($this->httpClient === null) {
            $this->httpClient = HttpClient::create(
                [
                    'timeout' => self::HTTP_TIMEOUT,
                ]
            );
        }

        return $this->httpClient;
    }

    public function getGraphQlEndpoint(): string
    {
        return sprintf(
            self::GRAPH_QL_ENDPOINT,
            $this->getConfig()->getEnvironment()->toString()
        );
    }
}
