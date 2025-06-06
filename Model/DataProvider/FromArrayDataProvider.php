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

use MonedaPay\MonedaPayLib\Model\ArrayableInterface;

class FromArrayDataProvider extends BasicDataProvider
{
    /**
     * @param \MonedaPay\MonedaPayLib\Model\DataProvider\ProvidableDataObjectInterface $object
     * @return mixed
     */
    public function provideData(
        ProvidableDataObjectInterface &$object
    ): mixed {
        $data = parent::provideData($object);
        if (is_a($object, ArrayableInterface::class)) {
            /** @var ArrayableInterface $object */
            $object->fillFromArray($data);
        }

        return $data;
    }

    /**
     * @param callable $callback
     * @return \MonedaPay\MonedaPayLib\Model\DataProvider\DataProviderInterface
     */
    public function setDataCallback(callable $callback): DataProviderInterface
    {
        $this->_closure = $callback(...);

        return $this;
    }
}
