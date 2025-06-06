<?php
/**
 * Created by Qoliber
 *
 * @category    MonedaPay
 * @package     MonedaPay_MonedaPayLib
 * @author      qoliber <info@qoliber.com>
 */

declare(strict_types = 1);

namespace MonedaPay\MonedaPayLib\Model\Request;

use MonedaPay\MonedaPayLib\Enum\EcommerceType;

interface CreatePaymentRequestInterface extends RequestInterface
{
    public function setMerchantId(string $merchantId): self;

    public function setShopId(string $shopId): self;

    public function setMerchantOrderId(string $orderId): self;

    public function setEcommerceType(EcommerceType $ecommerceType): self;

    public function setCallbackUrl(string $callbackUrl): self;

    public function setCancelUrl(?string $cancelUrl = null): self;
}
