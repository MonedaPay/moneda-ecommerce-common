<?php
/**
 * Created by Qoliber
 *
 * @category    MonedaPay
 * @package     MonedaPay_MonedaPayLib
 * @author      qoliber <info@qoliber.com>
 */

declare(strict_types = 1);

namespace MonedaPay\MonedaPayLib\Model\Response;

use MonedaPay\MonedaPayLib\Enum\AggregatedOrderStatus;
use MonedaPay\MonedaPayLib\Model\ArrayableTrait;
use MonedaPay\MonedaPayLib\Model\DataProvider\ProvidableObjectTrait;

class AggregatedOrderStatusResponse implements
    AggregatedOrderStatusResponseInterface
{
    use ArrayableTrait;
    use ProvidableObjectTrait;

    private ?string $orderId = null;
    private ?AggregatedOrderStatus $aggregatedStatus = null;

    public function setOrderId(
        string $orderId
    ): AggregatedOrderStatusResponseInterface {
        $this->orderId = $orderId;

        return $this;
    }

    public function setAggregatedStatus(
        string $aggregatedStatus
    ): AggregatedOrderStatusResponseInterface {
        $this->aggregatedStatus =
            AggregatedOrderStatus::from($aggregatedStatus);

        return $this;
    }

    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    public function getAggregatedStatus(): ?string
    {
        return $this->aggregatedStatus?->toString();
    }
}
