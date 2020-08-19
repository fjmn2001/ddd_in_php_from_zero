<?php


declare(strict_types=1);


namespace MN\Nelson\Courses\Application;


use MN\Nelson\Courses\Domain\Course;
use MN\Nelson\Courses\Domain\CourseDuration;
use MN\Nelson\Courses\Domain\CourseId;
use MN\Nelson\Courses\Domain\CourseName;
use MN\Nelson\Courses\Domain\CourseRepository;

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
