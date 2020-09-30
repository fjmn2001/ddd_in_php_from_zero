<?php

declare(strict_types=1);

namespace MN\Tests\Francisco\Courses\Application\Create;

use MN\Francisco\Courses\Application\CreateCourseCommand;
use MN\Francisco\Courses\Domain\CourseDuration;
use MN\Francisco\Courses\Domain\CourseId;
use MN\Francisco\Courses\Domain\CourseName;
use MN\Tests\Francisco\Courses\Domain\CourseDurationMother;
use MN\Tests\Francisco\Courses\Domain\CourseIdMother;
use MN\Tests\Francisco\Courses\Domain\CourseNameMother;

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