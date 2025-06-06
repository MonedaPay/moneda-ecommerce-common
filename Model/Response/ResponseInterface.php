<?php
/**
 * Created by Qoliber
 *
 * @category    MonedaPay
 * @package     MonedaPay_MonedaPayLib
 * @author      qoliber <info@qoliber.com>
 */

declare(strict_types = 1);

namespace MonedaPay\MonedaPayLib\Model\Response;

use MonedaPay\MonedaPayLib\Model\ArrayableInterface;
use MonedaPay\MonedaPayLib\Model\DataProvider\ProvidableDataObjectInterface;

interface ResponseInterface extends ArrayableInterface,
    ProvidableDataObjectInterface
{
}
