<?php

declare(strict_types=1);

namespace App\DTO\ParserUtils;

use App\Exceptions\ParseException;
use Carbon\Carbon;
use Exception;

trait ParseCarbonTrait
{
    use ParseStringTrait;

    /** @description Reference(&) needed for passing Undefined array keys * */
    protected static function parseNullableCarbon(mixed &$value): ?Carbon
    {
        try {
            $stringDate = self::parseNullableString($value);
            if ($stringDate === null) {
                return null;
            }

            return Carbon::parse($value);
        } catch (Exception $exception) {
            throw new ParseException('Parse invalid date time format');
        }

    }

    /** @description Reference(&) needed for passing Undefined array keys * */
    protected static function parseCarbon(mixed &$value, ?Carbon $defaultValue = null): Carbon
    {
        $castedValue = self::parseNullableCarbon($value);
        if ($castedValue === null) {
            if ($defaultValue === null) {
                throw new ParseException('Parse Carbon value required');
            }

            return $defaultValue;
        }

        return $castedValue;
    }
}
