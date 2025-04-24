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

use Ari10\MonedaPayLib\Model\ArrayableInterface;

class FromArrayDataProvider extends BasicDataProvider
{
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

    public function setDataCallback(callable $callback): DataProviderInterface
    {
        $this->_closure = $callback(...);

        return $this;
    }
}
