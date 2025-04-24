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

trait ProvidableObjectTrait
{
    private ?DataProviderInterface $_dataProvider = null;

    public function setDataProvider(
        ?DataProviderInterface $dataProvider = null
    ): self {
        $this->_dataProvider = $dataProvider;

        return $this;
    }

    public function provideData(): void
    {
        $this->_dataProvider?->provideData($this);
    }
}
