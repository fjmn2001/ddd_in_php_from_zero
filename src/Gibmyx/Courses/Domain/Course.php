<?php


declare(strict_types=1);


namespace MN\Gibmyx\Courses\Domain;


use MN\Shared\Domain\Aggregate\AggregateRoot;

final class Course extends AggregateRoot
{

    private $id;
    private $name;
    private $duration;

    public function __construct(CourseId $id, CourseName $name, CourseDuration $duration)
    {
        $this->id = $id;
        $this->name = $name;
        $this->duration = $duration;
    }

    public static function create(CourseId $id, CourseName $name, CourseDuration $duration): self
    {
        $course = new self($id, $name, $duration);
        $course->record(new CourseCreatedDomainEvent($id->value(), $name->value(), $duration->value()));
        return $course;
    }

    public function id(): CourseId
    {
        return $this->id;
    }

    public function name(): CourseName
    {
        return $this->name;
    }

    public function duration(): CourseDuration
    {
        return $this->duration;
    }
}