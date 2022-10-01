<?php

declare(strict_types=1);

namespace App\DTO\ParserUtils;

use App\Exceptions\ParseException;
use Exception;

trait ParseFloatTrait
{
    /** @description Reference(&) needed for passing Undefined array keys * */
    protected static function parseNullableFloat(mixed &$value): ?float
    {
        try {
            if ((string) $value === '0') {
                return 0;
            }

            return empty($value) ? null : (float) $value;
        } catch (Exception $exception) {
            throw new ParseException('Parse float failed');
        }
    }

    /** @description Reference(&) needed for passing Undefined array keys * */
    protected static function parseFloat(mixed &$value, ?float $defaultValue = null): float
    {
        $castedValue = self::parseNullableFloat($value);
        if ($castedValue === null) {
            if ($defaultValue === null) {
                throw new ParseException('Parse float value required');
            }

            return $defaultValue;
        }

        return $castedValue;
    }
}
