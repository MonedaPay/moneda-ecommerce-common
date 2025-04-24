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

interface OrderInfoResponseInterface extends ResponseInterface
{
    /**
     * @param string $orderId
     *
     * @return self
     */
    public function setMerchantOrderId(string $orderId): self;

    /**
     * @return string|null
     */
    public function getMerchantOrderId(): ?string;

    /**
     * @param string $customerId
     *
     * @return self
     */

    public function setMerchantCustomerId(string $customerId): self;

    /**
     * @return string|null
     */
    public function getMerchantCustomerId(): ?string;

    /**
     * @param string $fromCurrency
     *
     * @return self
     */

    public function setFromCurrency(string $fromCurrency): self;

    /**
     * @param string $fromAmount
     *
     * @return self
     */

    public function setFromAmount(string $fromAmount): self;

    /**
     * @param string $email
     *
     * @return self
     */

    public function setEmail(string $email): self;

    /**
     * @param string $firstName
     *
     * @return self
     */

    public function setFirstName(string $firstName): self;

    /**
     * @param string $lastName
     *
     * @return self
     */

    public function setLastName(string $lastName): self;

    /**
     * @return string|null
     */

    public function getFromCurrency(): ?string;

    /**
     * @return string|null
     */

    public function getFromAmount(): ?string;

    /**
     * @return string|null
     */

    public function getEmail(): ?string;

    /**
     * @return string|null
     */

    public function getFirstName(): ?string;

    /**
     * @return string|null
     */

    public function getLastName(): ?string;
}
