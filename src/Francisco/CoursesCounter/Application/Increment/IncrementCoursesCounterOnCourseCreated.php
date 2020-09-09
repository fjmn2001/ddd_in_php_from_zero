<?php


declare(strict_types=1);


namespace MN\Francisco\CoursesCounter\Application\Increment;


use MN\Francisco\Courses\Domain\CourseCreatedDomainEvent;
use MN\Francisco\Courses\Domain\CourseId;
use MN\Shared\Domain\Bus\Event\DomainEventSubscriber;
use function Lambdish\Phunctional\apply;

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