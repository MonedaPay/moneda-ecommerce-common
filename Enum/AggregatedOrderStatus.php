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

enum AggregatedOrderStatus: string
{
    use EnumTrait;

    case CREATED = 'CREATED';
    case IN_PROGRESS = 'IN_PROGRESS';
    case SUCCESS = 'SUCCESS';
    case UNDERPAID = 'UNDERPAID';
    case OVERPAID = 'OVERPAID';
    case FAILURE = 'FAILURE';
    case CANCELLED = 'CANCELLED';
}
