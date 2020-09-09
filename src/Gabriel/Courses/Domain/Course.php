<?php

declare(strict_types=1);


namespace MN\Gabriel\Courses\Domain;


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