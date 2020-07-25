<?php

declare(strict_types=1);

namespace MN\Gibmyx\Shared\Domain;


interface RandomNumberGenerator
{
    public function generate() : int;
}