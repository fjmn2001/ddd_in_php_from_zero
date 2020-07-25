<?php

namespace MN\Shared\Infrastructure;

final class RandomNumberGenerator
{
    public function generate() : int
    {
        return random_int(1, 5);
    }

}