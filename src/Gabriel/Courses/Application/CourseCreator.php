<?php

declare(strict_types=1);


namespace MN\Gabriel\Courses\Application;


use MN\Gabriel\Courses\Domain\CourseRepository;
use MN\Gabriel\Courses\Domain\Course;

class CourseCreator
{

    private $repository;

    public function __construct(CourseRepository $respository)
    {
        $this->repository =$respository;
    }
    public function __invoke(CreateCourseRequest $request): void
    {
        $course = new Course($request->id(), $request->name(), $request->duration());

        $this->repository->save($course);
    }
}