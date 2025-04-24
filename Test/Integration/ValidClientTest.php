<?php
/**
 * Created by Qoliber
 *
 * @author      qoliber <info@qoliber.com>
 */

declare(strict_types = 1);

namespace Ari10\MonedaPayLib\Test\Integration;

use Ari10\MonedaPayLib\Enum\AggregatedOrderStatus;
use Ari10\MonedaPayLib\Enum\Currency;
use Ari10\MonedaPayLib\Enum\EcommerceType;
use Ari10\MonedaPayLib\Model\DataProvider\BasicDataProvider;
use Ari10\MonedaPayLib\Model\DataProvider\FromArrayDataProvider;
use Ari10\MonedaPayLib\Model\Request\CreatePaymentRequest;
use Ari10\MonedaPayLib\Model\Response\AggregatedOrderStatusResponse;
use Ari10\MonedaPayLib\Model\Response\OrderInfoResponse;
use Ari10\MonedaPayLib\Service\Client;
use Ari10\MonedaPayLib\Service\Encryption;
use Ari10\MonedaPayLib\Test\Integration\Fake\Config;
use PHPUnit\Framework\TestCase;

class ValidClientTest extends TestCase
{
    protected ?Client $client = null;
    protected ?Config $config = null;
    protected ?Encryption $encryption = null;

    public function testInstance()
    {
        $this->assertInstanceOf(
            Client::class,
            $this->client
        );
    }

    public function testCreatePaymentLink()
    {
        $request = new CreatePaymentRequest();
        $request->setMerchantOrderId('merch-order-id');
        $request->setEcommerceType(EcommerceType::MAGENTO);
        $request->setMerchantId($this->config->getMerchantId());
        $request->setShopId($this->config->getShopId());
        $request->setCallbackUrl('callback-url');
        $request->setCancelUrl('cancel-url');

        $expected = $this->client->getHttpEndpoint() . '?' . http_build_query(
            $request->toArray()
        );
        $this->assertEquals(
            $expected,
            $this->client->createPaymentLink($request)
        );
    }

    public function testCreateOrderInfoRequest()
    {
        $object = new OrderInfoResponse();

        $dataRepository = [
            'merch-order-id' => [

                'email'              => 'email-test',
                'firstName'          => 'first name',
                'lastName'           => 'last name',
                'fromAmount'         => '123.0',
                'fromCurrency'       => Currency::USD->toString(),
                'merchantCustomerId' => 'merch-customer-id',
            ],
        ];
        $dataProvider = new FromArrayDataProvider();
        $dataProvider->setDataCallback(
            function ($object) use ($dataRepository) {
                return $dataRepository[$object->getObjectValue(
                    'merchantOrderId'
                )];
            }
        );
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_POST = ['orderId' => 'merch-order-id'];
        $_SERVER['HTTP_TILTUP_HMAC'] =
            $this->encryption->generate('merch-order-id');
        ob_start();
        $this->client->createOrderInfoRequest($object);
        $this->client->sendResponse($object);
        $output = ob_get_clean();
        $this->assertEquals($output, json_encode($object->toArray()));
    }

    public function testCreateStatusUpdate()
    {
        $object = new AggregatedOrderStatusResponse();

        $dataProvider = new BasicDataProvider();

        $newStatus = null;
        $dataProvider->setDataCallback(
            function ($object) use (&$newStatus) {
                $newStatus = $object->getObjectValue('aggregatedStatus');
            }
        );
        $object->setDataProvider($dataProvider);

        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST = [
            'orderId'          => 'merch-order-id',
            'aggregatedStatus' => AggregatedOrderStatus::UNDERPAID->toString(),
        ];
        $_SERVER['HTTP_TILTUP_HMAC'] =
            $this->encryption->generate($_POST['orderId']);
        ob_start();
        $this->client->createStatusUpdate($object);
        $this->client->sendResponse($object);
        $output = ob_get_clean();
        $this->assertEquals($newStatus->toString(), $_POST['aggregatedStatus']);
    }

    public function testGetSupportedCurrencies()
    {
        $this->assertEquals(
            [
                Currency::USD->toString(),
                Currency::PLN->toString(),
            ],
            $this->client->getSupportedCurrencies()
        );
    }

    public function testGetHttpEndpoint()
    {
        $expected = sprintf(
            'https://payment.%s.monedapay.io/ecommerce',
            $this->config->getEnvironment()->toString()
        );
        $this->assertEquals($expected, $this->client->getHttpEndpoint());
    }

    public function testGetGraphQlEndpoint()
    {
        $expected = sprintf(
            'https://be.%s.monedapay.io/graphql',
            $this->config->getEnvironment()->toString()
        );
        $this->assertEquals($expected, $this->client->getGraphQlEndpoint());
    }

    protected function setUp(): void
    {
        $this->config = new Config();
        $this->encryption = new Encryption($this->config);
        $this->client = new Client(
            $this->config
        );
    }

    protected function tearDown(): void
    {
        $this->client = null;
        $this->config = null;
        $this->encryption = null;
    }
}
