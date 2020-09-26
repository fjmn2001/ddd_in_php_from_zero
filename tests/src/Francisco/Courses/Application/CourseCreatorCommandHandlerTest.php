<?php


declare(strict_types=1);


namespace MN\Tests\Francisco\Courses\Application;


use MN\Francisco\Courses\Application\CourseCreator;
use MN\Francisco\Courses\Application\CreateCourseCommand;
use MN\Francisco\Courses\Application\CreateCourseCommandHandler;
use MN\Tests\Francisco\Courses\CoursesModuleUnitTestCase;
use MN\Tests\Francisco\Courses\Domain\CourseCreatedDomainEventMother;
use MN\Tests\Francisco\Courses\Domain\CourseMother;

final class CourseCreatorCommandHandlerTest extends CoursesModuleUnitTestCase
{
    private $handler;

    protected function setUp(): void
    {
        parent::setUp();
        $this->handler = new CreateCourseCommandHandler(new CourseCreator($this->repository(), $this->eventBus()));
    }

    /**
     * @test
     */
    public function it_should_create_a_valid_course(): void
    {
        $course = CourseMother::random();
        $domainEvent = CourseCreatedDomainEventMother::fromCourse($course);

        $this->shouldSave($course);
        $this->shouldPublishDomainEvent($domainEvent);

        $this->handler->__invoke(new CreateCourseCommand(
            $course->id()->value(),
            $course->name()->value(),
            $course->duration()->value()
        ));
    }

}