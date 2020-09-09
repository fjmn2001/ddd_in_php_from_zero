<?php


declare(strict_types=1);


namespace MN\Shared\Domain;


interface UuidGenerator
{
    public function generate(): string;
}