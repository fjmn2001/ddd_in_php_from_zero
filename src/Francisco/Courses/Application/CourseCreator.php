<?php


declare(strict_types=1);


namespace MN\Francisco\Courses\Application;


use MN\Francisco\Courses\Domain\Course;
use MN\Francisco\Courses\Domain\CourseRepository;

final class CourseCreator
{

    private $repository;

    public function __construct(CourseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CreateCourseRequest $request): void
    {
        $course = new Course($request->id(), $request->name(), $request->duration());

        $this->repository->save($course);
    }
}