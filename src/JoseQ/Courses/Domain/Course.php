<?php
/**
 * Created by PhpStorm.
 * User: trabajo
 * Date: 01/08/20
 * Time: 11:21 AM
 */

namespace MN\JoseQ\Courses\Domain;


use MN\Shared\Domain\Bus\Event\DomainEvent\AggregateRoot;

class Course extends AggregateRoot
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
