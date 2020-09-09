<?php

declare(strict_types=1);


namespace MN\Gibmyx\CoursesCounter\Infrastructure\Persistence\Doctrine;


use MN\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class CourseCounterIdType extends UuidType
{
    protected function typeClassName(): string
    {
        // TODO: Implement typeClassName() method.
    }
}