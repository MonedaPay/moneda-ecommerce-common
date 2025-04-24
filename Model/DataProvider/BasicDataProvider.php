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

use Closure;

class BasicDataProvider implements DataProviderInterface
{
    protected ?Closure $_closure = null;
    public function provideData(
        ProvidableDataObjectInterface &$object
    ): mixed {
        return ($this->_closure)($object);
    }

    public function setDataCallback(callable $callback): DataProviderInterface
    {
        $this->_closure = $callback(...);
        return $this;
    }
}
