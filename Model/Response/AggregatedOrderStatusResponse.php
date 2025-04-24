<?php
/**
 * Created by Qoliber
 *
 * @category    Ari10
 * @package     Ari10_MonedaPayLib
 * @author      qoliber <info@qoliber.com>
 */

declare(strict_types = 1);

namespace Ari10\MonedaPayLib\Model\Response;

use Ari10\MonedaPayLib\Enum\AggregatedOrderStatus;
use Ari10\MonedaPayLib\Model\ArrayableTrait;
use Ari10\MonedaPayLib\Model\DataProvider\ProvidableObjectTrait;

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
