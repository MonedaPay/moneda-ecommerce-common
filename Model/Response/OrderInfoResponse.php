<?php
/**
 * Created by Qoliber
 *
 * @category    Ari10
 * @package     Ari10_MonedaPayLib
 * @author      qoliber <info@qoliber.com>
 */

declare(strict_types = 1);

namespace Ari10\MonedaPayLib\Model\Response;

use Ari10\MonedaPayLib\Model\ArrayableTrait;
use Ari10\MonedaPayLib\Model\DataProvider\ProvidableObjectTrait;

class OrderInfoResponse implements OrderInfoResponseInterface
{
    use ArrayableTrait;
    use ProvidableObjectTrait;

    private ?string $merchantOrderId = null;
    private ?string $merchantCustomerId = null;
    private ?string $fromCurrency = null;
    private ?string $fromAmount = null;
    private ?string $email = null;
    private ?string $firstName = null;
    private ?string $lastName = null;

    public function setMerchantOrderId(
        string $orderId
    ): OrderInfoResponseInterface {
        $this->merchantOrderId = $orderId;

        return $this;
    }

    public function setMerchantCustomerId(
        string $customerId
    ): OrderInfoResponseInterface {
        $this->merchantCustomerId = $customerId;

        return $this;
    }

    public function setFromCurrency(
        string $fromCurrency
    ): OrderInfoResponseInterface {
        $this->fromCurrency = $fromCurrency;

        return $this;
    }

    public function setFromAmount(
        string $fromAmount
    ): OrderInfoResponseInterface {
        $this->fromAmount = $fromAmount;

        return $this;
    }

    public function setEmail(string $email): OrderInfoResponseInterface
    {
        $this->email = $email;

        return $this;
    }

    public function setFirstName(string $firstName): OrderInfoResponseInterface
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function setLastName(string $lastName): OrderInfoResponseInterface
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getMerchantOrderId(): ?string
    {
        return $this->merchantOrderId;
    }

    public function getMerchantCustomerId(): ?string
    {
        return $this->merchantCustomerId;
    }

    public function getFromCurrency(): ?string
    {
        return $this->fromCurrency;
    }

    public function getFromAmount(): ?string
    {
        return $this->fromAmount;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }
}
