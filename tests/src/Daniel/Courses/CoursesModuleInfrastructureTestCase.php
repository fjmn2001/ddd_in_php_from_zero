<?php

declare(strict_types=1);


namespace MN\Tests\Daniel\Courses;


use Doctrine\ORM\EntityManager;
use MN\Daniel\Courses\Domain\CourseRepository;
use MN\Daniel\Courses\Infrastructure\Persistence\DoctrineCourseRepository;
use MN\Tests\Daniel\Shared\Infrastructure\PhpUnit\DanielContextInfrastructureTestCase;

abstract class CoursesModuleInfrastructureTestCase extends DanielContextInfrastructureTestCase
{
    protected function repository(): CourseRepository
    {
        return $this->service(CourseRepository::class);
    }

    protected function doctrineRepository(): CourseRepository
    {
        return new DoctrineCourseRepository($this->service(EntityManager::class));
    }
}