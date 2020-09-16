<?php


declare(strict_types=1);


namespace MN\Gabriel\CoursesCounter\Application\Increment;



use MN\Gabriel\Courses\Domain\CourseId;
use MN\Gabriel\CoursesCounter\Domain\CoursesCounter;
use MN\Gabriel\CoursesCounter\Domain\CoursesCounterId;
use MN\Gabriel\CoursesCounter\Domain\CoursesCounterRepository;
use MN\Shared\Domain\Bus\Event\EventBus;
use MN\Shared\Domain\UuidGenerator;

final class CoursesCounterIncrementer
{
    private $repository;
    private $uuidGenerator;
    private $bus;

    public function __construct(
        CoursesCounterRepository $repository,
        UuidGenerator $uuidGenerator,
        EventBus $bus
    ) {

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