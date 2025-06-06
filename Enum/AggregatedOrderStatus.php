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
