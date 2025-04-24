<?php
/**
 * Created by Qoliber
 *
 * @author      qoliber <info@qoliber.com>
 */

declare(strict_types = 1);

namespace Ari10\MonedaPayLib\Test\Integration;

use Ari10\MonedaPayLib\Enum\Currency;
use Ari10\MonedaPayLib\Model\DataProvider\FromArrayDataProvider;
use Ari10\MonedaPayLib\Model\Response\OrderInfoResponse;
use Ari10\MonedaPayLib\Model\Response\OrderInfoResponseInterface;
use PHPUnit\Framework\TestCase;

class ValidResponseDataProviderTest extends TestCase
{
    public function testOrderInfoRequest()
    {
        $object = new OrderInfoResponse();

        $dataRepository = [
            'merch-order-id' => [
                'merchantOrderId' => 'merch-order-id',
                'email' => 'email-test',
                'firstName' => 'first name',
                'lastName' => 'last name',
                'fromAmount' => '123.0',
                'fromCurrency' => Currency::USD->toString(),
                'merchantCustomerId' => 'merch-customer-id',
            ],
        ];
        $object->setMerchantOrderId('merch-order-id');
        $dataProvider = new FromArrayDataProvider();
        $dataProvider->setDataCallback(
            function ($object) use ($dataRepository) {
                /** @var OrderInfoResponseInterface $object */
                return $dataRepository[$object->getObjectValue(
                    'merchantOrderId'
                )];
            }
        );
        $object->setDataProvider($dataProvider);
        $object->provideData();

        $this->assertEquals(
            $object->toArray(),
            $dataRepository['merch-order-id']
        );
    }
}
