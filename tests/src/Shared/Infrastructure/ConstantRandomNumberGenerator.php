<?php


declare(strict_types=1);


namespace MN\Tests\Shared\Infrastructure;


final class ConstantRandomNumberGenerator implements \MN\Shared\Domain\RandomNumberGenerator
{

    public function generate(): int
    {
        return 1;
    }
}