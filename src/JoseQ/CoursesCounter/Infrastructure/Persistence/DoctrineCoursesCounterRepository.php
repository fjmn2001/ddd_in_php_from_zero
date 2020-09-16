<?php

declare(strict_types=1);


namespace MN\JoseQ\CoursesCounter\Infrastructure\Persistence;


use MN\JoseQ\CoursesCounter\Domain\CoursesCounter;
use MN\JoseQ\CoursesCounter\Domain\CoursesCounterRepository;
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