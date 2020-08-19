<?php

declare(strict_types=1);


namespace MN\Shared\Infrastructure\Persistence\Doctrine\Dbal;


interface DoctrineCustomType
{
    public static function customTypeName(): string;
}