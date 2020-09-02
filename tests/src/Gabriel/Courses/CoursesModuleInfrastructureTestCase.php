<?php


declare(strict_types=1);


namespace MN\Tests\Gabriel\Courses;


use MN\Gabriel\Courses\Domain\CourseRepository;
use MN\Tests\Gabriel\Shared\Infrastructure\PhpUnit\GabrielContextInfrastructureTestCase;

abstract class CoursesModuleInfrastructureTestCase extends GabrielContextInfrastructureTestCase
{
    protected function repository(): CourseRepository
    {
        return $this->service(CourseRepository::class);
    }
}