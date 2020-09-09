<?php


namespace MN\Tests\Joseq\Courses\Infrastructure;


use MN\JoseQ\Courses\Infrastructure\FileCourseRepository;
use MN\Tests\Joseq\Courses\Domain\CourseMother;
use PHPUnit\Framework\TestCase;

class FileCourseRepositoryTest extends TestCase
{
        /**
         @test
         */
    public function it_should_save_a_course(): void
    {
        $repository = new FileCourseRepository();
        $course = CourseMother::random();
        $repository->save($course);
    }
    /**
     * @test
     */
    public function it_should_return_an_existing_course(): void
    {
        $repository = new FileCourseRepository();
        $course = CourseMother::random();
        $repository->save($course);

        $this->assertEquals($course, $repository->search($course->id()));
    }
    /**
     * @test
     */
    public function it_should__not_return_an_existing_course(): void
    {
        $course = CourseMother::random();
        $repository = new FileCourseRepository();

        $this->assertNull($repository->search($course->id()));
    }
}