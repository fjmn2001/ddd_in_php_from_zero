<?php


declare(strict_types=1);


namespace MN\Gibmyx\Courses\Application;


use MN\Gibmyx\Courses\Domain\Course;
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
        $course = new Course ($request->id(), $request->name(), $request->duration());

        $this->reposirtory->save($course);
    }
}
