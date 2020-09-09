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
        $this->doctrineRepository()->save($course);
        $this->clearUnitOfWork();
    }
    /**
     * @test
     */
    public function it_should_return_an_existing_course(): void
    {
        $course = CourseMother::random();
        $this->doctrineRepository()->save($course);
        $this->assertEquals($course, $this->doctrineRepository()->search($course->id()));
        $this->clearUnitOfWork();
    }
    /**
     * @test
     */
    public function it_should__not_return_an_existing_course(): void
    {
        $course = CourseMother::random();
        $this->assertNull($this->doctrineRepository()->search($course->id()));
    }
}