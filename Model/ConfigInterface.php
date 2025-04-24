<?php
/**
 * Created by Qoliber
 *
 * @category    Ari10
 * @package     Ari10_MonedaPayLib
 * @author      qoliber <info@qoliber.com>
 */

declare(strict_types = 1);

namespace Ari10\MonedaPayLib\Model;

use Ari10\MonedaPayLib\Enum\EcommerceType;
use Ari10\MonedaPayLib\Enum\Environment;

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
