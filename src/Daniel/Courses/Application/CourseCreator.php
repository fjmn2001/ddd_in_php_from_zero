<?php


declare(strict_types=1);


namespace MN\Daniel\Courses\Application;


use MN\Daniel\Courses\Domain\Course;
use MN\Daniel\Courses\Domain\CourseDuration;
use MN\Daniel\Courses\Domain\CourseId;
use MN\Daniel\Courses\Domain\CourseName;
use MN\Daniel\Courses\Domain\CourseRepository;
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
        $this->bus->publish($course->pullDomainEvents());
    }
}