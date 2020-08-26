<?php

declare(strict_types=1);


namespace MN\Tests\Joseq\Courses\Infrastructure\Persistence;


use MN\Tests\Joseq\Courses\CourseModuleInfrastructureTestCase;
use MN\Tests\Joseq\Courses\Domain\CourseMother;

final class DoctrineCourseRepositoryTest extends CourseModuleInfrastructureTestCase
{
    /**
     * @test
     */
    public function try_it_should_save_a_course()
    {
        $course = CourseMother::random();
        $this->repository()->save($course);
    }
}