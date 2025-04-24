<?php
/**
 * Created by Qoliber
 *
 * @category    Ari10
 * @package     Ari10_MonedaPayLib
 * @author      qoliber <info@qoliber.com>
 */

declare(strict_types = 1);

namespace Ari10\MonedaPayLib\Model\DataProvider;

interface DataProviderInterface
{
    /**
     * @param callable $callback
     *
     * @return \Ari10\MonedaPayLib\Model\DataProvider\DataProviderInterface
     */
    public function setDataCallback(callable $callback): DataProviderInterface;

    /**
     * @param \Ari10\MonedaPayLib\Model\DataProvider\ProvidableDataObjectInterface $object
     *
     * @return mixed
     */
    public function provideData(
        ProvidableDataObjectInterface &$object
    ): mixed;
}
