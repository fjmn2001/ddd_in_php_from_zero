<?php
/**
 * Created by PhpStorm.
 * User: trabajo
 * Date: 01/08/20
 * Time: 10:58 AM
 */

namespace MN\JoseQ\Courses\Application;


use MN\JoseQ\Courses\Domain\Course;
use MN\JoseQ\Courses\Domain\CourseDuration;
use MN\JoseQ\Courses\Domain\CourseId;
use MN\JoseQ\Courses\Domain\CourseName;
use MN\JoseQ\Courses\Domain\CourseRepository;

class CourseCreator
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