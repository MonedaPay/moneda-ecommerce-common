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

enum EcommerceType: string
{
    use EnumTrait;

    case PRESTASHOP = 'PRESTASHOP';
    case SHOPIFY = 'SHOPIFY';
    case MAGENTO = 'MAGENTO';
}
