<?php


declare(strict_types=1);


namespace MN\Nelson\Courses\Application;


use MN\Nelson\Courses\Domain\Course;
use MN\Nelson\Courses\Domain\CourseRepository;

final class CourseCreator
{

    private $repository;

    public function __construct(CourseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $id, string $name, string $duration): void
    {
        $course = new Course($id, $name, $duration);

        $this->repository->save($course);
    }
}
