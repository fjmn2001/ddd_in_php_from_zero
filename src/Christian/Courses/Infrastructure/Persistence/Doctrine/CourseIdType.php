<?php

declare(strict_types=1);

namespace MN\Christian\Courses\Infrastructure\Persistence\Doctrine;

use MN\Christian\Courses\Domain\CourseId;
use MN\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class CourseIdType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'course_id';
    }

    protected function typeClassName(): string
    {
        return CourseId::class;
    }
}