<?php

declare(strict_types=1);

namespace MN\Christian\Courses\Infrastructure\Persistence\Doctrine;

final class CourseIdType extends UuidType
{
    public static function customTypeName(): string
    {

    }
}