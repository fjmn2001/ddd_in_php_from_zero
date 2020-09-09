<?php


declare(strict_types=1);


namespace MN\Daniel\CoursesCounter\Application\Increment;


use MN\Daniel\Courses\Domain\CourseCreatedDomainEvent;
use MN\Daniel\Courses\Domain\CourseId;
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