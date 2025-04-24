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

interface ArrayableInterface
{
    /**
     * Returns array of the object: properties as keys, values as values
     *
     * @return array
     */
    public function toArray(): array;

    /**
     * @param string $key
     *
     * @return mixed
     */

    public function getObjectValue(string $key): mixed;

    /**
     * @param array $data
     *
     * @return self
     */
    public function fillFromArray(array $data): self;
}
