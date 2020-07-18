<?php


declare(strict_types=1);


namespace MN\Shared\Infrastructure;


final class RandomNumberGenerator
{
    public function generate(): int
    {
        return random_int(1, 5);
    }
}