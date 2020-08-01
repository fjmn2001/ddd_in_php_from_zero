<?php

namespace MN\Shared\Infrastructure;


final class PhpRandomNumberGenerator implements \MN\Shared\Domain\RandomNumberGenerator
{
    public function generate() : int
    {
        return random_int(1, 5);
    }

}