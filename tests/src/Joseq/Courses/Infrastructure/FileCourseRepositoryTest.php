<?php


namespace MN\Tests\Joseq\Courses\Infrastructure;


use MN\JoseQ\Courses\Domain\Course;
use MN\JoseQ\Courses\Infrastructure\FileCourseRepository;
use PHPUnit\Framework\TestCase;

class FileCourseRepositoryTest extends TestCase
{
        /**
         @test
         */
    public function it_should_save_a_course(): void
    {
        $repository = new FileCourseRepository();
        $course = new Course('id', 'name', 'duration');

        $repository->save($course);
    }

    public function it_should_return_an_existing_course(): void
    {
        $course_id = (string)rand(1,100);
        $repository = new FileCourseRepository();
        $course = new Course($course_id, 'name', 'duration');

        $repository->save($course);

        $this->assertEquals($course, $repository->search($course_id));
    }

    public function it_should__not_return_an_existing_course(): void
    {
        $repository = new FileCourseRepository();
        $this->assertNull($repository->search('no_exist_course'));
    }
}