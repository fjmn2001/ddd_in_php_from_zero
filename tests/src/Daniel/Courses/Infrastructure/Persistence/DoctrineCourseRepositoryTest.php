<?php

declare(strict_types=1);


namespace MN\Tests\Daniel\Courses\Infrastructure\Persistence;


use MN\Tests\Daniel\Courses\CoursesModuleInfrastructureTestCase;
use MN\Tests\Daniel\Courses\Domain\CourseMother;

final class DoctrineCourseRepositoryTest extends CoursesModuleInfrastructureTestCase
{
    /**
     * @test
     */
    public function try_it_should_save_a_course()
    {
        $course = CourseMother::random();
        $this->doctrineRepository()->save($course);
    }

    /**
     *@test
     */
    public function it_should_return_an_existing_course(): void
    {
        $course = CourseMother::random();
        $this->doctrineRepository()->save($course);
        $this->assertEquals($course, $this->doctrineRepository()->search($course->id()));
    }

    /**
     *@test
     */
    public function it_should_not_return_an_existing_course(): void
    {
        $course = CourseMother::random();
        $this->assertNull($this->doctrineRepository()->search($course->id()));
    }
}