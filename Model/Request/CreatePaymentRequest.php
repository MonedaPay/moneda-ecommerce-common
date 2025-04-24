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
use Ari10\MonedaPayLib\Model\ArrayableTrait;

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
