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

enum Environment: string
{
    use EnumTrait;

    case DEV = 'dev';
    case STAGING = 'staging';
    case PRODUCTION = 'app';
}
