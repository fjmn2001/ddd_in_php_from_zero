<?php


declare(strict_types=1);


namespace MN\Tests\Francisco\Courses\Domain;


use MN\Francisco\Courses\Application\CreateCourseCommand;
use MN\Francisco\Courses\Domain\Course;
use MN\Francisco\Courses\Domain\CourseDuration;
use MN\Francisco\Courses\Domain\CourseId;
use MN\Francisco\Courses\Domain\CourseName;

final class CourseMother
{
    public static function create(CourseId  $id, CourseName $name, CourseDuration  $duration): Course
    {
        return new Course($id, $name, $duration);
    }

    public static function fromRequest(CreateCourseCommand $request): Course
    {
        return self::create(
            CourseIdMother::create($request->id()),
            CourseNameMother::create($request->name()),
            CourseDurationMother::create($request->duration())
        );
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