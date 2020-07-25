<?php


declare(strict_types=1);


namespace MN\Tests\Shared\Infrastructure;


use MN\Shared\Domain\RandomNumberGenerator;

final class ConstantRandomNumberGenerator implements RandomNumberGenerator
{
    public function generate(): int
    {
        return 1;
    }
}