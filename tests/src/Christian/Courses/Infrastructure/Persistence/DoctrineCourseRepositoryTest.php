<?php


declare(strict_types=1);


namespace MN\Tests\Christian\Courses\Infrastructure\Persistence;


use MN\Tests\Christian\Courses\Domain\CourseMother;
use MN\Tests\Christian\Courses\CoursesModuleInfrastructureTestCase;

final class DoctrineCourseRepositoryTest extends CoursesModuleInfrastructureTestCase
{
    /**
     * @test
     */
    public function try_it_should_save_a_course()
    {
        $course = CourseMother::random();
        $this->repository()->save($course);
    }
    
    /**
     * @test
     */
    public function it_should_return_a_existing_course(): void
    {
        $course = CourseMother::random();
        $this->doctrineRepository()->save($course);
        $this->assertEquals($course, $this->repository()->search($course->id()));
        $this->clearUnitOfWork();
    }

    /**
     * @test
     */
    public function it_should_not_return_a_existing_course(): void
    {
        $course = CourseMother::random();
        $this->assertNull($this->doctrineRepository()->search($course->id()));
    }
}