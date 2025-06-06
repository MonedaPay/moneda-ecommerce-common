<?php
/**
 * Created by Qoliber
 *
 * @category    MonedaPay
 * @package     MonedaPay_MonedaPayLib
 * @author      qoliber <info@qoliber.com>
 */

declare(strict_types = 1);

namespace MonedaPay\MonedaPayLib\Model;

use MonedaPay\MonedaPayLib\Enum\EcommerceType;
use MonedaPay\MonedaPayLib\Enum\Environment;

interface ConfigInterface
{
    public function getEnvironment(): ?Environment;

    public function getEcommerceType(): ?EcommerceType;

    public function getApiSecret(): ?string;

    public function getApiKey(): ?string;

    public function getBaseEcommerceUrl(): ?string;

    public function getMerchantId(): ?string;

    public function getShopId(): ?string;
}
