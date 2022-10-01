<?php

declare(strict_types=1);

namespace App\DTO\ParserUtils;

use App\Exceptions\ParseException;
use Exception;

trait ParseArrayTrait
{
    /**
     * @description Reference(&) needed for passing Undefined array keys
     * @return array<mixed>
     */
    protected static function parseNullableArray(mixed &$value): ?array
    {
        if (!isset($value)) {
            return null;
        }

        if (empty($value)) {
            return [];
        }

        try {
            return (array) $value;
        } catch (Exception $exception) {
            throw new ParseException('Parse array failed');
        }
    }

    /**
     * @description Reference(&) needed for passing Undefined array keys
     * @return array<mixed>
     */
    protected static function parseArray(mixed &$value, ?array $defaultValue = null): array
    {
        $castedValue = self::parseNullableArray($value);
        if ($castedValue === null) {
            if ($defaultValue === null) {
                throw new ParseException('Parse array value required');
            }

            return $defaultValue;
        }

        return $castedValue;
    }
}
