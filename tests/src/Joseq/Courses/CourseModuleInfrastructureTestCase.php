<?php

declare(strict_types=1);


namespace MN\Tests\Joseq\Courses;


use MN\JoseQ\Courses\Domain\CourseRepository;
use MN\Tests\Joseq\Shared\Infrastructure\PhpUnit\JoseQContextInfrastructureTestCase;

abstract class CourseModuleInfrastructureTestCase extends JoseQContextInfrastructureTestCase
{
    protected function repository(): CourseRepository
    {
        return $this->service(CourseRepository::class);
    }
}