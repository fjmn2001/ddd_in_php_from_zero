<?php


declare(strict_types=1);


namespace MN\Tests\Pereira\Courses;


use MN\Pereira\Courses\Domain\CourseRepository;
use MN\Tests\Pereira\Shared\Infrastructure\PhpUnit\PereiraContextInfrastructureTestCase;

abstract class CoursesModuleInfrastructureTestCase extends PereiraContextInfrastructureTestCase
{
    protected function repository(): CourseRepository
    {
        return $this->service(CourseRepository::class);
    }
}