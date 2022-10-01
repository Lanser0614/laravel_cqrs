<?php

declare(strict_types=1);

namespace App\DTO\ParserUtils;

trait ParseDataTrait
{
    use ParseArrayTrait;
    use ParseBoolTrait;
    use ParseFloatTrait;
    use ParseIntTrait;
    use ParseStringTrait;
    use ParseCarbonTrait;
}
