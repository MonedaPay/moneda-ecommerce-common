<?php
/**
 * Created by Qoliber
 *
 * @category    MonedaPay
 * @package     MonedaPay_MonedaPayLib
 * @author      qoliber <info@qoliber.com>
 */

declare(strict_types = 1);

namespace MonedaPay\MonedaPayLib\Model\DataProvider;

interface DataProviderInterface
{
    /**
     * @param callable $callback
     *
     * @return \MonedaPay\MonedaPayLib\Model\DataProvider\DataProviderInterface
     */
    public function setDataCallback(callable $callback): DataProviderInterface;

    /**
     * @param \MonedaPay\MonedaPayLib\Model\DataProvider\ProvidableDataObjectInterface $object
     *
     * @return mixed
     */
    public function provideData(
        ProvidableDataObjectInterface &$object
    ): mixed;
}
