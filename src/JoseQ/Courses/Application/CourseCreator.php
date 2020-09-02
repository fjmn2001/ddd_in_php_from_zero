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
use MN\Shared\Domain\Bus\Event\EventBus;

class CourseCreator
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