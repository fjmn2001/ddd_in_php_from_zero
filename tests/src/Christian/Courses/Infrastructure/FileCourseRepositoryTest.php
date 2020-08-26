<?php


declare(strict_types=1);


namespace MN\Tests\Christian\Courses\Infrastructure;

use MN\Christian\Courses\Infrastructure\FileCourseRepository;
use MN\Tests\Christian\Courses\CoursesModuleUnitTestCase;
use MN\Tests\Christian\Courses\Domain\CourseMother;

final class FileCourseRepositoryTest extends CoursesModuleUnitTestCase
{
    /**
     * @test
     */
    public function it_should_save_a_course(): void
    {
        $repository = new FileCourseRepository;
        $course = CourseMother::random();
        $repository->save($course);
    }
    /**
     * @test
     */
    public function it_should_return_an_existing_course(): void
    {
        $repository = new FileCourseRepository;
        $course = CourseMother::random();
        $repository->save($course);

        $this->assertEquals($course, $repository->search($course->id()));
    }
    /**
     * @test
     */
    public function it_should_not_return_an_existing_course(): void
    {
        $repository = new FileCourseRepository;
        $course = CourseMother::random();
        $this->assertNull($repository->search($course->id()));
    }
}