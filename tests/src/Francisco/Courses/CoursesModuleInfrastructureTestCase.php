<?php


declare(strict_types=1);


namespace MN\Tests\Francisco\Courses;


use MN\Francisco\Courses\Domain\CourseRepository;
use MN\Tests\Francisco\Shared\Infrastructure\PhpUnit\FranciscoContextInfrastructureTestCase;

abstract class CoursesModuleInfrastructureTestCase extends FranciscoContextInfrastructureTestCase
{
    protected function repository(): CourseRepository
    {
        return $this->service(CourseRepository::class);
    }
}