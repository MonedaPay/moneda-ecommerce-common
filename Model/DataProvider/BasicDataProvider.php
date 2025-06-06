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

use Closure;

class BasicDataProvider implements DataProviderInterface
{
    /** @var \Closure|null  */
    protected ?Closure $_closure = null;

    /**
     * @param \MonedaPay\MonedaPayLib\Model\DataProvider\ProvidableDataObjectInterface $object
     * @return mixed
     */
    public function provideData(
        ProvidableDataObjectInterface &$object
    ): mixed {
        return ($this->_closure)($object);
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
