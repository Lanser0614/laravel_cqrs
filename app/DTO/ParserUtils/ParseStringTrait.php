<?php

declare(strict_types=1);

namespace App\DTO\ParserUtils;

use App\Exceptions\ParseException;
use Exception;

trait ParseStringTrait
{
    /** @description Reference(&) needed for passing Undefined array keys * */
    protected static function parseNullableString(mixed &$value): ?string
    {
        try {
            if ($value === null) {
                return null;
            }

            return (string) $value;
        } catch (Exception $error) {
            throw new ParseException('Parse string failed');
        }
    }

    /** @description Reference(&) needed for passing Undefined array keys * */
    protected static function parseString(mixed &$value, ?string $defaultValue = null): string
    {
        $castedValue = self::parseNullableString($value);
        if ($castedValue === null) {
            if ($defaultValue === null) {
                throw new ParseException('Parse string value required');
            }

            return $defaultValue;
        }

        return $castedValue;
    }
}
