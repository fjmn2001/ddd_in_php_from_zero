<?php


declare(strict_types=1);


namespace MN\Francisco\CoursesCounter\Application\Increment;


use MN\Francisco\CoursesCounter\Domain\CoursesCounterRepository;

final class CoursesCounterIncrementer
{
    public function __construct(
        CoursesCounterRepository $repository,
        UuidGenerator $uuidGenerator,
        EventBus $bus
    ) {
        $this->repository    = $repository;
        $this->uuidGenerator = $uuidGenerator;
        $this->bus           = $bus;
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