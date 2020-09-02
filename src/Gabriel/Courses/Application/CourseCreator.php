<?php

declare(strict_types=1);


namespace MN\Gabriel\Courses\Application;


use MN\Gabriel\Courses\Domain\CourseDuration;
use MN\Gabriel\Courses\Domain\CourseId;
use MN\Gabriel\Courses\Domain\CourseName;
use MN\Gabriel\Courses\Domain\CourseRepository;
use MN\Gabriel\Courses\Domain\Course;
use MN\Shared\Domain\Bus\Event\EventBus;

final class CourseCreator
{

    private $repository;
    private $bus;

    public function __construct(CourseRepository $respository , EventBus $bus)
    {
        $this->repository =$respository;
        $this->bus = $bus;
    }

    public function __invoke(CreateCourseRequest $request): void
    {
        $id = new CourseId($request->id());
        $name = new CourseName($request->name());
        $duration = new CourseDuration($request->duration());

        $course = Course::create($id, $name, $duration);

        $this->repository->save($course);
        //$this->bus->publish($course->pullDomainEvents());
    }
}