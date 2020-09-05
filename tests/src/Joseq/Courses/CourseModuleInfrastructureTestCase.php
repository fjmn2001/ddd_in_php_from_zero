<?php

declare(strict_types=1);


namespace MN\Tests\Joseq\Courses;


use Doctrine\ORM\EntityManager;
use MN\JoseQ\Courses\Domain\CourseRepository;
use MN\JoseQ\Courses\Infrastructure\Persistence\DoctrineCourseRepository;
use MN\Tests\Joseq\Shared\Infrastructure\PhpUnit\JoseQContextInfrastructureTestCase;

abstract class CourseModuleInfrastructureTestCase extends JoseQContextInfrastructureTestCase
{
    protected function doctrineRepository(): CourseRepository
    {
        return new DoctrineCourseRepository($this->service(EntityManager::class));
    }
}