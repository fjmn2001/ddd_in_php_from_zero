<?php


declare(strict_types=1);


namespace MN\Daniel\CoursesCounter\Infrastructure\Persistence;


use MN\Daniel\CoursesCounter\Domain\CoursesCounter;
use MN\Daniel\CoursesCounter\Domain\CoursesCounterRepository;
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