<?php

declare(strict_types=1);

namespace MN\Tests\Christian\Courses;


use Doctrine\ORM\EntityManager;
use MN\Christian\Courses\Domain\CourseRepository;
use MN\Christian\Courses\Infrastructure\Persistence\DoctrineCourseRepository;
use MN\Tests\Christian\Shared\Infrastructure\PhpUnit\ChristianContextInfrastructureTestCase;

class CoursesModuleInfrastructureTestCase extends ChristianContextInfrastructureTestCase
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