<?php

namespace MN\Shared\Domain;

interface RandomNumberGenerator
{
    public function generate(): int;
}