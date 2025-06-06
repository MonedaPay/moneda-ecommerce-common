<?php
/**
 * Created by Qoliber
 *
 * @category    MonedaPay
 * @package     MonedaPay_MonedaPayLib
 * @author      qoliber <info@qoliber.com>
 */

declare(strict_types = 1);

namespace MonedaPay\MonedaPayLib\Enum;

enum Currency: string
{
    use EnumTrait;

    case EUR = 'EUR';
    case USD = 'USD';
    case GBP = 'GBP';
    case PLN = 'PLN';
}
