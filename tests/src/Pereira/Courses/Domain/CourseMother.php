<?php


declare(strict_types=1);


namespace MN\Tests\Pereira\Courses\Domain;


use MN\Pereira\Courses\Domain\Course;
use MN\Pereira\Courses\Domain\CourseDuration;
use MN\Pereira\Courses\Domain\CourseId;
use MN\Pereira\Courses\Domain\CourseName;

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