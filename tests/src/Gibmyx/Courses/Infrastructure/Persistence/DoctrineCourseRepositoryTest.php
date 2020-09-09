<?php


declare(strict_types=1);


namespace MN\Tests\Gibmyx\Courses\Infrastructure\Persistence;


use MN\Gibmyx\Courses\Domain\CourseId;
use MN\Gibmyx\Courses\Infrastructure\FileCourseRepository;
use MN\Tests\Gibmyx\Courses\CourseModuleInfrastrutureTestCase;
use MN\Tests\Gibmyx\Courses\Domain\CourseMother;

final class DoctrineCourseRepositoryTest extends CourseModuleInfrastrutureTestCase
{
    /**
     * @test
     */
    public function try_it_should_save_a_course()
    {
        $course = CourseMother::random();
        $this->doctrineRepositoyy()->save($course);
        $this->clearUnitOfWork();
    }

    /**
     * @test
     */
    public function it_should_return_a_existing_course(): void
    {
        $course = CourseMother::random();
        $this->doctrineRepositoyy()->save($course);
        $this->assertEquals($course, $this->doctrineRepositoyy()->search( $course->id() ));
        $this->clearUnitOfWork();
    }

    /**
     * @test
     */
    public function it_should_not_return_a_existing_course(): void
    {
        $course = CourseMother::random();
        $this->assertNull($this->doctrineRepositoyy()->search( $course->id() ));
        $this->clearUnitOfWork();
    }

    public function clearUnitOfWork() :void
    {
        //..
    }
}