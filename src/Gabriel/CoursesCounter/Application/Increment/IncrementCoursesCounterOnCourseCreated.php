<?php


declare(strict_types=1);


namespace MN\Gabriel\CoursesCounter\Application\Increment;


use MN\Shared\Domain\Bus\Event\DomainEventSubscriber;

final class IncrementCoursesCounterOnCourseCreated implements DomainEventSubscriber
{
    private $incrementer;

    public function __construct(CoursesCounterIncrementer $incrementer)
    {
        $this->incrementer = $incrementer;
    }

    public static function subscribedTo(): array
    {
        return [CourseCreatedDomainEvent::class];
    }

    public function __invoke(CourseCreatedDomainEvent $event): void
    {
        $courseId = new CourseId($event->aggregateId());

        apply($this->incrementer, [$courseId]);
    }
}