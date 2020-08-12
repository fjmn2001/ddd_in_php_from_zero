<?php


declare(strict_types=1);


namespace MN\Daniel\Courses\Application;


use MN\Daniel\Courses\Domain\Course;
use MN\Daniel\Courses\Domain\CourseDuration;
use MN\Daniel\Courses\Domain\CourseId;
use MN\Daniel\Courses\Domain\CourseName;
use MN\Daniel\Courses\Domain\CourseRepository;

final class CourseCreator
{
    private $repository;

    public function __construct(CourseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CreateCourseRequest $request): void
    {
        $course = new Course(new CourseId($request->id()),
                            new CourseName($request->name()),
                            new CourseDuration($request->duration()));

        $this->repository->save($course);
    }
}