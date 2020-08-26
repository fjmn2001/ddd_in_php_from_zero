<?php


declare(strict_types=1);


namespace MN\Tests\Christian\Courses\Domain;


use MN\Christian\Courses\Domain\Course;
use MN\Christian\Courses\Domain\CourseDuration;
use MN\Christian\Courses\Domain\CourseId;
use MN\Christian\Courses\Domain\CourseName;

final class CourseMother
{
    public static function create(CourseId  $id, CourseName $name, CourseDuration  $duration): Course
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