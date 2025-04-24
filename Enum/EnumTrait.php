<?php
/**
 * Created by Qoliber
 *
 * @category    Ari10
 * @package     Ari10_MonedaPayLib
 * @author      qoliber <info@qoliber.com>
 */

declare(strict_types = 1);

namespace Ari10\MonedaPayLib\Enum;

trait EnumTrait
{
    /**
     * Returns array of values
     *
     * @return array
     */
    public static function toArray(): array
    {
        return array_values(self::toOptionArray());
    }

    /**
     * Returns array key => value
     *
     * @return array
     */
    public static function toOptionArray(): array
    {
        return array_reduce(
            self::cases(),
            function ($carry, $case) {
                $carry[$case->name] = $case->value;

                return $carry;
            },
            []
        );
    }

    /**
     * @return string
     */

    public function toString(): string
    {
        return $this->value;
    }
}
