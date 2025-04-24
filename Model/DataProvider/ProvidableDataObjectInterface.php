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

interface ProvidableDataObjectInterface
{
    /**
     * @param \Ari10\MonedaPayLib\Model\DataProvider\DataProviderInterface $dataProvider
     *
     * @return self
     */
    public function setDataProvider(DataProviderInterface $dataProvider): self;

    /**
     * @return void
     */

    public function provideData(): void;
}
