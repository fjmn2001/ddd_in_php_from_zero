<?php

declare(strict_types = 1);


namespace MN\Shared\Domain;


interface RandomNumberGenerator
{
    public function generate(): int;
}