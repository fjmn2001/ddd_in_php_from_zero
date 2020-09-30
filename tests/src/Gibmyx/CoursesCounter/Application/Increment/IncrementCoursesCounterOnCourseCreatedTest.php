<?php

declare(strict_types=1);


namespace MN\Tests\Gibmyx\CoursesCounter\Application\Increment;


use MN\Gibmyx\CoursesCounter\Application\Increment\CoursesCounterIncrementer;
use MN\Gibmyx\CoursesCounter\Application\Increment\IncrementCoursesCounterOnCourseCreated;
use MN\Tests\Gibmyx\Courses\Domain\CourseCreatedDomainEventMother;
use MN\Tests\Gibmyx\Courses\Domain\CourseIdMother;
use MN\Tests\Gibmyx\CoursesCounter\CoursesCounterModuleUnitTestCase;
use MN\Tests\Gibmyx\CoursesCounter\Domain\CoursesCounterIncrementedDomainEventMother;
use MN\Tests\Gibmyx\CoursesCounter\Domain\CoursesCounterMother;

final class IncrementCoursesCounterOnCourseCreatedTest extends CoursesCounterModuleUnitTestCase
{
    private $subscriber;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subscriber = new IncrementCoursesCounterOnCourseCreated(
            new CoursesCounterIncrementer(
                $this->repository(),
                $this->uuidGenerator(),
                $this->eventBus()
            )
        );
    }

    /** @test */
    public function it_should_initialize_a_new_counter(): void
    {
        $event = CourseCreatedDomainEventMother::random();

        $courseId = CourseIdMother::create($event->aggregateId());
        $newCounter = CoursesCounterMother::withOne($courseId);
        $domainEvent = CoursesCounterIncrementedDomainEventMother::fromCounter($newCounter);

        $this->shouldSearch(null);
        $this->shouldGenerateUuid($newCounter->id()->value());
        $this->shouldSave($newCounter);
        $this->shouldPublishDomainEvent($domainEvent);

        $this->notify($event, $this->subscriber);
    }

    /** @test */
    public function it_should_increment_an_existing_counter(): void
    {
        $event = CourseCreatedDomainEventMother::random();

        $courseId = CourseIdMother::create($event->aggregateId());
        $existingCounter = CoursesCounterMother::random();
        $incrementedCounter = CoursesCounterMother::incrementing($existingCounter, $courseId);
        $domainEvent = CoursesCounterIncrementedDomainEventMother::fromCounter($incrementedCounter);

        $this->shouldSearch($existingCounter);
        $this->shouldSave($incrementedCounter);
        $this->shouldPublishDomainEvent($domainEvent);

        $this->notify($event, $this->subscriber);
    }

    /** @test */
    public function it_should_not_increment_an_already_incremented_course(): void
    {
        $event = CourseCreatedDomainEventMother::random();

        $courseId = CourseIdMother::create($event->aggregateId());
        $existingCounter = CoursesCounterMother::withOne($courseId);

        $this->shouldSearch($existingCounter);

        $this->notify($event, $this->subscriber);
    }
}