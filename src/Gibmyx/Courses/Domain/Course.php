<?php


declare(strict_types=1);


namespace MN\Gibmyx\Courses\Domain;


final class Course
{

    private $id;
    private $name;
    private $duration;

    public function __construct(string $id, string $name, string $duration)
    {
        $this->id = $id;
        $this->name = $name;
        $this->duration = $duration;
    }
}