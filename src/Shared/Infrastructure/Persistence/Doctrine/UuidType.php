<?php


declare(strict_types=1);


namespace MN\Shared\Infrastructure\Persistence\Doctrine;


use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;
use MN\Shared\Domain\Utils;
use MN\Shared\Domain\ValueObject\Uuid;
use MN\Shared\Infrastructure\Persistence\Doctrine\Dbal\DoctrineCustomType;

abstract class UuidType extends StringType implements DoctrineCustomType
{
    abstract protected function typeClassName(): string;

    public function getName(): string
    {
        return self::customTypeName();
    }

    public static function customTypeName(): string
    {
        return Utils::toSnakeCase(str_replace('Type', '', last(explode('\\', static::class))));
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $className = $this->typeClassName();

        return new $className($value);
    }

    /** @var Uuid $value */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value->value();
    }
}