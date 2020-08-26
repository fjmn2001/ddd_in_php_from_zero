<?php


declare(strict_types=1);


namespace MN\Tests\Gibmyx\Courses;


use MN\Gibmyx\Courses\Domain\CourseRepository;
use MN\Tests\Gibmyx\Shared\Infrastructure\PhpUnit\GibmyxContextInfrastructureTestCase;

abstract class CourseModuleInfrastrutureTestCase extends GibmyxContextInfrastructureTestCase
{
    protected function repositoyy(): CourseRepository
    {
        return $this->service(CourseRepository::class);
    }
}