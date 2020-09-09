<?php


declare(strict_types=1);


namespace MN\Shared\Infrastructure\Persistence\Doctrine;


use Doctrine\DBAL\Types\StringType;
use MN\Shared\Domain\Utils;
use MN\Shared\Infrastructure\Persistence\Doctrine\Dbal\DoctrineCustomType;

abstract class UuidType extends StringType implements DoctrineCustomType
{
    abstract protected function typeClassName(): string;

    public static function customTypeName(): string
    {
        return Utils::toSnakeCase(str_replace('Type', '', last(explode('\\', static::class))));
    }
}