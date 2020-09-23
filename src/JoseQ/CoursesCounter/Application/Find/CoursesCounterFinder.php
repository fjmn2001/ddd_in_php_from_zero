<?php

declare(strict_types=1);


namespace MN\JoseQ\CoursesCounter\Application\Find;


use MN\JoseQ\CoursesCounter\Domain\CoursesCounterNotExist;
use MN\JoseQ\CoursesCounter\Domain\CoursesCounterRepository;

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