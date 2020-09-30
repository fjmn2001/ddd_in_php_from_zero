<?php

declare(strict_types=1);

namespace MN\Tests\Daniel\Courses\Application;

use MN\Daniel\Courses\Application\CourseCreator;
use MN\Daniel\Courses\Application\CreateCourseCommandHandler;
use MN\Tests\Daniel\Courses\Application\Create\CreateCourseCommandMother;
use MN\Tests\Daniel\Courses\CoursesModuleUnitTestCase;
use MN\Tests\Daniel\Courses\Domain\CourseCreatedDomainEventMother;
use MN\Tests\Daniel\Courses\Domain\CourseMother;

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
        $domainEvent = CourseCreatedDomainEventMother::fromCommand($course);

        $this->shouldSave($course);
        $this->shouldPublishDomainEvent($domainEvent);

        $this->dispatch($command, $this->handler);
    }

}