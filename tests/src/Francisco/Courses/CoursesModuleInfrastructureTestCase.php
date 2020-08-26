<?php


declare(strict_types=1);


namespace MN\Tests\Francisco\Courses;


use Doctrine\ORM\EntityManager;
use MN\Francisco\Courses\Domain\CourseRepository;
use MN\Francisco\Courses\Infrastructure\Persistence\DoctrineCourseRepository;
use MN\Tests\Francisco\Shared\Infrastructure\PhpUnit\FranciscoContextInfrastructureTestCase;

abstract class CoursesModuleInfrastructureTestCase extends FranciscoContextInfrastructureTestCase
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