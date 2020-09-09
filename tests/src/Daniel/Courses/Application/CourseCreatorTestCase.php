<?php

declare(strict_types=1);


namespace MN\Tests\Daniel\Courses\Application;


use MN\Daniel\Courses\Application\CourseCreator;
use MN\Daniel\Courses\Application\CreateCourseRequest;
use MN\Tests\Daniel\Courses\CourseModuleUnitTestCase;
use MN\Tests\Daniel\Courses\Domain\CourseMother;
use MN\Tests\Daniel\Domain\CourseCreatedDomainEventMother;

final class CourseCreatorTestCase extends CourseModuleUnitTestCase
{
    private $creator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->creator = new CourseCreator($this->repository(), $this->eventBus());
    }

    /**
    *@test
    */
    public function it_should_create_a_valid_course(): void
    {
        $course = CourseMother::random();
        $domainEvent = CourseCreatedDomainEventMother::fromCourse($course);

        $this->shouldSave($course);
        $this->shouldPublishDomainEvent($domainEvent);

        $this->creator->__invoke(new CreateCourseRequest(
            $course->id()->value(),
            $course->name()->value(),
            $course->duration()->value()
        ));
    }

}