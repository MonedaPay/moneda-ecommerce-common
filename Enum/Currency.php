<?php
/**
 * Created by Qoliber
 *
 * @category    Ari10
 * @package     Ari10_MonedaPayLib
 * @author      qoliber <info@qoliber.com>
 */

declare(strict_types = 1);

namespace Ari10\MonedaPayLib\Enum;

enum Currency: string
{
    use EnumTrait;

    case EUR = 'EUR';
    case USD = 'USD';
    case GBP = 'GBP';
    case PLN = 'PLN';
}
