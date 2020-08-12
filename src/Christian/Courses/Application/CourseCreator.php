<?php


declare(strict_types=1);


namespace MN\Christian\Courses\Application;


use MN\Christian\Courses\Domain\Course;
use MN\Christian\Courses\Domain\CourseDuration;
use MN\Christian\Courses\Domain\CourseId;
use MN\Christian\Courses\Domain\CourseName;
use MN\Christian\Courses\Domain\CourseRepository;

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