<?php

declare(strict_types=1);


namespace MN\Ddd\Courses\Application;


use MN\Ddd\Courses\Domain\CourseRepository;
use MN\Ddd\Courses\Domain\Course;

class CourseCreator
{

    private $repository;

    public function __construct(CourseRepository $respository)
    {
        $this->repository =$respository;
    }
    public function __invoke( string $id, string $name, string $duration): void
    {
        $course = new Course($id, $name, $duration);

        $this->repository->save($course);
    }
}