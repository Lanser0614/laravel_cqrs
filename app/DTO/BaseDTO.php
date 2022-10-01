<?php

namespace App\DTO;

use App\DTO\ParserUtils\ParseDataTrait;
use JsonSerializable;

abstract class BaseDTO implements  JsonSerializable
{
    use ParseDataTrait;
    /**
     * @param array<mixed> $data
     */
    abstract public static function fromArray(array $data): static;

    abstract public  function toArray(): array;


}
