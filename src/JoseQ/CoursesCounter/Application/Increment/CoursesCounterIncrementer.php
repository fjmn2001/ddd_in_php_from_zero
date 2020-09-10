<?php

declare(strict_types=1);


namespace MN\JoseQ\CoursesCounter\Application\Increment;


use MN\JoseQ\Courses\Domain\CourseId;
use MN\JoseQ\CoursesCounter\Domain\CoursesCounter;
use MN\JoseQ\CoursesCounter\Domain\CoursesCounterId;
use MN\JoseQ\CoursesCounter\Domain\CoursesCounterRepository;
use MN\Shared\Domain\Bus\Event\EventBus;
use MN\Shared\Domain\UuidGenerator;

final class CoursesCounterIncrementer
{
    public function __construct(
        CoursesCounterRepository $repository,
        UuidGenerator $uuidGenerator,
        EventBus $bus
    )
    {
        $this->repository = $repository;
        $this->uuidGenerator = $uuidGenerator;
        $this->bus = $bus;
    }

    public function __invoke(CourseId $courseId): void
    {
        $counter = $this->repository->search() ?: $this->initializeCounter();

        if (!$counter->hasIncremented($courseId)) {
            $counter->increment($courseId);

            $this->repository->save($counter);
            $this->bus->publish(...$counter->pullDomainEvents());
        }
    }

    private function initializeCounter(): CoursesCounter
    {
        return CoursesCounter::initialize(new CoursesCounterId($this->uuidGenerator->generate()));
    }
}