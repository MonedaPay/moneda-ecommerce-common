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

use ReflectionClass;

trait ArrayableTrait
{
    public function getObjectValue(string $key): mixed
    {
        return $this->toArray()[$key] ?? null;
    }

    public function toArray(): array
    {
        return array_filter(
            get_object_vars($this),
            function ($key) {
                return !str_starts_with($key, '_');
            },
            ARRAY_FILTER_USE_KEY
        );
    }

    public function fillFromArray(array $data): self
    {
        $reflection = new ReflectionClass($this);
        foreach ($data as $key => $value) {
            if ($reflection->hasProperty($key)) {
                $property = $reflection->getProperty($key);
                $property->setAccessible(true);
                $property->setValue($this, $value);
            }
        }

        return $this;
    }
}
