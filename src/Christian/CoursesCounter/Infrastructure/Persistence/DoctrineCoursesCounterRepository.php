<?php

declare(strict_types=1);

namespace MN\Christian\CoursesCounter\Infrastructure\Persistence;

use MN\Christian\CoursesCounter\Domain\CoursesCounterRepository;
use \MN\Christian\CoursesCounter\Domain\CoursesCounter;
use MN\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class DoctrineCoursesCounterRepository extends DoctrineRepository implements CoursesCounterRepository
{
    public function save(CoursesCounter $counter): void
    {
        $this->persist($counter);
    }

    public function search(): ?CoursesCounter
    {
        return $this->repository(CoursesCounter::class)->findOneBy([]);
    }
}