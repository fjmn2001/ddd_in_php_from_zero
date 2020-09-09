<?php


declare(strict_types=1);


namespace MN\Gibmyx\Courses\Application;


use MN\Gibmyx\Courses\Domain\Course;
use MN\Gibmyx\Courses\Domain\CourseDuration;
use MN\Gibmyx\Courses\Domain\CourseId;
use MN\Gibmyx\Courses\Domain\CourseName;
use MN\Gibmyx\Courses\Domain\CourseRepository;
use MN\Shared\Domain\Bus\Event\EventBus;

class CourseCreator
{

    private $reposirtory;
    private $bus;

    public function __construct(CourseRepository $reposirtory, EventBus $bus)
    {
        $this->reposirtory = $reposirtory;
        $this->bus = $bus;
    }

    public function __invoke(CreateCourseRequest $request) :void
    {
        $id = new CourseId($request->id());
        $name = new CourseName($request->name());
        $duration = new CourseDuration($request->duration());
        $course = Course::create($id, $name, $duration);

        $this->reposirtory->save($course);

        $this->bus->publish(...$course->pullDomainEvents());
    }
}
