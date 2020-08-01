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
}