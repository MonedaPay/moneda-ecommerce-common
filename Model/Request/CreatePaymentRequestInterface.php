<?php
/**
 * Created by Qoliber
 *
 * @category    Ari10
 * @package     Ari10_MonedaPayLib
 * @author      qoliber <info@qoliber.com>
 */

declare(strict_types = 1);

namespace Ari10\MonedaPayLib\Model\Request;

use Ari10\MonedaPayLib\Enum\EcommerceType;

interface CreatePaymentRequestInterface extends RequestInterface
{
    public function setMerchantId(string $merchantId): self;

    public function setShopId(string $shopId): self;

    public function setMerchantOrderId(string $orderId): self;

    public function setEcommerceType(EcommerceType $ecommerceType): self;

    public function setCallbackUrl(string $callbackUrl): self;

    public function setCancelUrl(?string $cancelUrl = null): self;
}
