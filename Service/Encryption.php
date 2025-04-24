<?php
/**
 * Created by Qoliber
 *
 * @category    Ari10
 * @package     Ari10_MonedaPayLib
 * @author      qoliber <info@qoliber.com>
 */

declare(strict_types = 1);

namespace Ari10\MonedaPayLib\Service;

use Ari10\MonedaPayLib\Exception\ConfigurationException;
use Ari10\MonedaPayLib\Model\ConfigInterface;

readonly class Encryption
{
    public function __construct(
        private ConfigInterface $configuration
    ) {
    }

    /**
     * @throws \Ari10\MonedaPayLib\Exception\ConfigurationException
     */
    public function validate(string $message, string $hmac): bool
    {
        return hash_equals(self::generate($message), $hmac);
    }

    /**
     * @throws \Ari10\MonedaPayLib\Exception\ConfigurationException
     */
    public function generate(string $message): string
    {
        return hash_hmac('sha256', $message, $this->getEncryptionKey());
    }

    /**
     * @throws \Ari10\MonedaPayLib\Exception\ConfigurationException
     */
    private function getEncryptionKey(): string
    {
        return $this->configuration->getApiSecret() ??
            throw new ConfigurationException('Encryption key is not set');
    }
}
