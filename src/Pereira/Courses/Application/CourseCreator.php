<?php


declare(strict_types=1);


namespace MN\Pereira\Courses\Application;


use MN\Pereira\Courses\Domain\Course;
use MN\Pereira\Courses\Domain\CourseDuration;
use MN\Pereira\Courses\Domain\CourseId;
use MN\Pereira\Courses\Domain\CourseName;
use MN\Pereira\Courses\Domain\CourseRepository;

final class CourseCreator
{

    private $repository;

    public function __construct(CourseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CreateCourseRequest $request): void
    {
        $course = new Course(new CourseId($request->id()), new CourseName($request->name()), new CourseDuration($request->duration()));

        $this->repository->save($course);
    }
}