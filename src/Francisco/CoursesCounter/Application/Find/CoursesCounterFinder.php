<?php

declare(strict_types=1);

namespace MN\Francisco\CoursesCounter\Application\Find;

use MN\Francisco\CoursesCounter\Domain\CoursesCounterNotExist;
use MN\Francisco\CoursesCounter\Domain\CoursesCounterRepository;

final class CoursesCounterFinder
{
    private $repository;

    public function __construct(CoursesCounterRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(): CoursesCounterResponse
    {
        $counter = $this->repository->search();

        if (null === $counter) {
            throw new CoursesCounterNotExist();
        }

        return new CoursesCounterResponse($counter->total()->value());
    }
}