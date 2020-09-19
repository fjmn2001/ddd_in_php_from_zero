<?php


declare(strict_types=1);


namespace MN\Tests\Gibmyx\Courses;


use Doctrine\ORM\EntityManager;
use MN\Gibmyx\Courses\Domain\CourseRepository;
use MN\Gibmyx\Courses\Infrastructure\Persistence\DoctrineCourseRepository;
use MN\Tests\Gibmyx\Shared\Infrastructure\PhpUnit\GibmyxContextInfrastructureTestCase;

abstract class CoursesModuleInfrastructureTestCase extends GibmyxContextInfrastructureTestCase
{
    protected function repositoyy(): CourseRepository
    {
        return $this->service(CourseRepository::class);
    }

    protected function doctrineRepositoyy(): CourseRepository
    {
        return new DoctrineCourseRepository($this->service(EntityManager::class));
    }
}