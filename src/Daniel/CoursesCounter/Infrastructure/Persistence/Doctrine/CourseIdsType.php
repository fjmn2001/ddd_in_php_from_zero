<?php


namespace MN\Daniel\CoursesCounter\Infrastructure\Persistence\Doctrine;


use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\JsonType;
use MN\Daniel\Courses\Domain\CourseId;
use MN\Shared\Infrastructure\Persistence\Doctrine\Dbal\DoctrineCustomType;
use function Lambdish\Phunctional\map;

final class CourseIdsType extends JsonType implements DoctrineCustomType
{
    public static function customTypeName(): string
    {
        return 'course_ids';
    }

    public function getName()
    {
        return self::customTypeName();
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return parent::convertToDatabaseValue(map(function (CourseId $id){
            return $id->value();
        }, $value), $platform);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return parent::convertToPHPValue(map(function (string $value){
            return new CourseId($value);
        }, $value), $platform);
    }
 }