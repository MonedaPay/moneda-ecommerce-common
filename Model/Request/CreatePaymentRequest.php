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
use MonedaPay\MonedaPayLib\Model\ArrayableTrait;

class CreatePaymentRequest implements CreatePaymentRequestInterface
{
    use ArrayableTrait;

    private ?string $merchantId = null;
    private ?string $shopId = null;
    private ?string $merchantOrderId = null;
    private ?string $type = null;
    private ?string $callbackUrl = null;
    private ?string $cancelUrl = null;

    public function setMerchantId(string $merchantId): self
    {
        $this->merchantId = $merchantId;

        return $this;
    }

    public function setShopId(string $shopId): self
    {
        $this->shopId = $shopId;

        return $this;
    }

    public function setMerchantOrderId(string $orderId): self
    {
        $this->merchantOrderId = $orderId;

        return $this;
    }

    public function setEcommerceType(EcommerceType $ecommerceType): self
    {
        $this->type = $ecommerceType->toString();

        return $this;
    }

    public function setCallbackUrl(string $callbackUrl): self
    {
        $this->callbackUrl = $callbackUrl;

        return $this;
    }

    public function setCancelUrl(?string $cancelUrl = null): self
    {
        $this->cancelUrl = $cancelUrl;

        return $this;
    }
}
