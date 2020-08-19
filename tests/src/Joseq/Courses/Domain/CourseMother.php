<?php

declare(strict_types=1);


namespace MN\Tests\Joseq\Courses\Domain;


use MN\JoseQ\Courses\Domain\Course;
use MN\JoseQ\Courses\Domain\CourseDuration;
use MN\JoseQ\Courses\Domain\CourseId;
use MN\JoseQ\Courses\Domain\CourseName;

final class CourseMother
{
    public static function create(CourseId $id, CourseName $name, CourseDuration $duration): Course
    {
        return new Course($id, $name, $duration);
    }

    public static function random(): Course
    {
        return self::create(
            CourseIdMother::random(),
            CourseNameMother::random(),
            CourseDurationMother::random()
        );
    }
}