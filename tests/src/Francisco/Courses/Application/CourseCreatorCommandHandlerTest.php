<?php

declare(strict_types=1);

namespace MN\Tests\Francisco\Courses\Application;

use MN\Francisco\Courses\Application\CourseCreator;
use MN\Francisco\Courses\Application\CreateCourseCommandHandler;
use MN\Tests\Francisco\Courses\Application\Create\CreateCourseCommandMother;
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
        $command = CreateCourseCommandMother::random();

        $course = CourseMother::fromRequest($command);
        $domainEvent = CourseCreatedDomainEventMother::fromCourse($course);

        $this->shouldSave($course);
        $this->shouldPublishDomainEvent($domainEvent);

        $this->dispatch($command, $this->handler);
    }

}