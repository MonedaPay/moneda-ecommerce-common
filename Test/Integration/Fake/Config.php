<?php
/**
 * Created by Qoliber
 *
 * @author      qoliber <info@qoliber.com>
 */

declare(strict_types = 1);

namespace Ari10\MonedaPayLib\Test\Integration\Fake;

use Ari10\MonedaPayLib\Enum\EcommerceType;
use Ari10\MonedaPayLib\Enum\Environment;
use Ari10\MonedaPayLib\Model\ConfigInterface;

class Config implements ConfigInterface
{
    public function getEnvironment(): ?Environment
    {
        return Environment::STAGING;
    }

    public function getEcommerceType(): ?EcommerceType
    {
        return EcommerceType::MAGENTO;
    }

    public function getApiSecret(): ?string
    {
        return 'test-api-secret';
    }

    public function getApiKey(): ?string
    {
        return 'test-api-key';
    }

    public function getBaseEcommerceUrl(): ?string
    {
        return 'https://app.ari10-magento.test';
    }

    public function getMerchantId(): ?string
    {
        return 'test-merch';
    }

    public function getShopId(): ?string
    {
        return 'test-shop';
    }
}
