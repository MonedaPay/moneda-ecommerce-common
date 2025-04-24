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

enum Environment: string
{
    use EnumTrait;

    case DEV = 'dev';
    case STAGING = 'staging';
    case PRODUCTION = 'app';
}
