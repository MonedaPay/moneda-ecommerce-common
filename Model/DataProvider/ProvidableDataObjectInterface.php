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

interface ProvidableDataObjectInterface
{
    /**
     * @param \MonedaPay\MonedaPayLib\Model\DataProvider\DataProviderInterface $dataProvider
     *
     * @return self
     */
    public function setDataProvider(DataProviderInterface $dataProvider): self;

    /**
     * @return void
     * @throws \MonedaPay\MonedaPayLib\Exception\OrderNotFoundException
     */

    public function provideData(): void;
}
