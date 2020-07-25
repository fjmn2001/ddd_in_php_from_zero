<?php

namespace MN\Tests\Shared\Infrastructure;

class ConstantRandomNumberGenerator implements \MN\Shared\Domain\RandomNumberGenerator
{
    public function generate(): int
    {
        return 1;
    }
}