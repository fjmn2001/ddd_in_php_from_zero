<?php


declare(strict_types=1);


namespace MN\Tests\Gabriel\Courses\Domain;


use MN\Gabriel\Courses\Domain\Course;
use MN\Gabriel\Courses\Domain\CourseDuration;
use MN\Gabriel\Courses\Domain\CourseId;
use MN\Gabriel\Courses\Domain\CourseName;

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