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

trait ProvidableObjectTrait
{
    /** @var \MonedaPay\MonedaPayLib\Model\DataProvider\DataProviderInterface|null */
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
