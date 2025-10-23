<?php
/**
 * Created by Qoliber
 *
 * @category    MonedaPay
 * @package     MonedaPay_MonedaPayLib
 * @author      qoliber <info@qoliber.com>
 */

declare(strict_types = 1);

namespace MonedaPay\MonedaPayLib\Service;

use MonedaPay\MonedaPayLib\Exception\ConfigurationException;
use MonedaPay\MonedaPayLib\Model\ConfigInterface;

class Encryption
{
    public function __construct(
        private ConfigInterface $configuration
    ) {
    }

    /**
     * @throws \MonedaPay\MonedaPayLib\Exception\ConfigurationException
     */
    public function validate(string $message, string $hmac): bool
    {
        return hash_equals(self::generate($message), $hmac);
    }

    /**
     * @throws \MonedaPay\MonedaPayLib\Exception\ConfigurationException
     */
    public function generate(string $message): string
    {
        return hash_hmac('sha256', $message, $this->getEncryptionKey());
    }

    /**
     * @throws \MonedaPay\MonedaPayLib\Exception\ConfigurationException
     */
    private function getEncryptionKey(): string
    {
        return $this->configuration->getApiSecret() ??
            throw new ConfigurationException('Encryption key is not set');
    }
}
