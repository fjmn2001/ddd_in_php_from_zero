<?php


declare(strict_types=1);


namespace MN\Tests\Gabriel\Courses\Domain;


use MN\Gabriel\Courses\Domain\Course;
use MN\Gabriel\Courses\Domain\CourseCreatedDomainEvent;
use MN\Gabriel\Courses\Domain\CourseDuration;
use MN\Gabriel\Courses\Domain\CourseId;
use MN\Gabriel\Courses\Domain\CourseName;

final class CourseCreatedDomainEventMother
{
    public static function create(CourseId $id, CourseName $name, CourseDuration $duration): CourseCreatedDomainEvent
    {
        return new CourseCreatedDomainEvent($id->value(), $name->value(), $duration->value());
    }

    public static function fromCourse(Course $course): CourseCreatedDomainEvent
    {
        return self::create($course->id(), $course->name(), $course->duration());
    }

    public static function random(): CourseCreatedDomainEvent
    {
        return self::create(CourseIdMother::random(), CourseNameMother::random(), CourseDurationMother::random());
    }
}