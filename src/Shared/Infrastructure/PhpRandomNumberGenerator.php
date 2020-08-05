<?php


declare(strict_types=1);


namespace MN\Shared\Infrastructure;


use MN\Shared\Domain\RandomNumberGenerator;

final class PhpRandomNumberGenerator implements RandomNumberGenerator
{
    /**
     * @return int
     * @throws \Exception
     */
    public function generate() : int
    {
        return random_int(1, 5);
    }
}