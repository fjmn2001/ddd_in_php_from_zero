<?php


declare(strict_types=1);


namespace MN\Gibmyx\Courses\Application;


use MN\Gibmyx\Courses\Domain\Course;
use MN\Gibmyx\Courses\Domain\CourseDuration;
use MN\Gibmyx\Courses\Domain\CourseId;
use MN\Gibmyx\Courses\Domain\CourseName;
use MN\Gibmyx\Courses\Domain\CourseRepository;

class CourseCreator
{

    private $reposirtory;

    public function __construct(CourseRepository $reposirtory)
    {
        $this->reposirtory = $reposirtory;
    }

    public function __invoke(CreateCourseRequest $request) :void
    {
        $course = new Course (
            new CourseId($request->id()),
            new CourseName($request->name()),
            new CourseDuration($request->duration())
        );

        $this->reposirtory->save($course);
    }
}
