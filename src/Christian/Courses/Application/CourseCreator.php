<?php


declare(strict_types=1);


namespace MN\Christian\Courses\Application;


use MN\Christian\Courses\Domain\Course;
use MN\Christian\Courses\Domain\CourseDuration;
use MN\Christian\Courses\Domain\CourseId;
use MN\Christian\Courses\Domain\CourseName;
use MN\Christian\Courses\Domain\CourseRepository;
use MN\Shared\Domain\Bus\Event\EventBus;

final class CourseCreator
{

    private $repository;
    private $bus;

    public function __construct(CourseRepository $repository, EventBus $bus)
    {
        $this->repository = $repository;
        $this->bus = $bus;
    }

    public function __invoke(CreateCourseRequest $request): void
    {
        $id = new CourseId($request->id());
        $name = new CourseName($request->name());
        $duration = new CourseDuration($request->duration());

        $course = Course::create($id, $name, $duration);

        $this->repository->save($course);
        //$this->bus->publish(...$course->pullDomainEvents());
    }
}