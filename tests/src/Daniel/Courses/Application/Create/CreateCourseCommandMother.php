<?php

declare(strict_types=1);

namespace MN\Tests\Daniel\Courses\Application\Create;

use MN\Daniel\Courses\Application\CreateCourseCommand;
use MN\Daniel\Courses\Domain\CourseDuration;
use MN\Daniel\Courses\Domain\CourseId;
use MN\Daniel\Courses\Domain\CourseName;
use MN\Tests\Daniel\Courses\Domain\CourseDurationMother;
use MN\Tests\Daniel\Courses\Domain\CourseIdMother;
use MN\Tests\Daniel\Courses\Domain\CourseNameMother;

final class CreateCourseCommandMother
{
    public static function create(CourseId $id, CourseName $name, CourseDuration $duration): CreateCourseCommand
    {
        return new CreateCourseCommand($id->value(), $name->value(), $duration->value());
    }

    public static function random(): CreateCourseCommand
    {
        return self::create(CourseIdMother::random(), CourseNameMother::random(), CourseDurationMother::random());
    }
}