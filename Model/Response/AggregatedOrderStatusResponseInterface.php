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

interface AggregatedOrderStatusResponseInterface extends ResponseInterface
{
    /**
     * @param string $orderId
     *
     * @return self
     */
    public function setOrderId(string $orderId): self;

    /**
     * @return string|null
     */
    public function getOrderId(): ?string;

    /**
     * @return string|null
     */
    public function getAggregatedStatus(): ?string;

    /**
     * @param string $aggregatedStatus
     *
     * @return self
     */

    public function setAggregatedStatus(
        string $aggregatedStatus
    ): self;
}
