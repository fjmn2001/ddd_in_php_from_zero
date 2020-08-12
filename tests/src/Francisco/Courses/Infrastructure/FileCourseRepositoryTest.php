<?php


declare(strict_types=1);


namespace MN\Tests\Francisco\Courses\Infrastructure;


use MN\Francisco\Courses\Domain\Course;
use MN\Francisco\Courses\Domain\CourseDuration;
use MN\Francisco\Courses\Domain\CourseId;
use MN\Francisco\Courses\Domain\CourseName;
use MN\Francisco\Courses\Infrastructure\FileCourseRepository;
use MN\Tests\Francisco\Courses\Domain\CourseMother;
use PHPUnit\Framework\TestCase;

final class FileCourseRepositoryTest extends TestCase
{
    /**
     * @test
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
    public function it_should_not_return_an_existing_course(): void
    {
        $course = CourseMother::random();
        $repository = new FileCourseRepository();
        $this->assertNull($repository->search($course->id()));
    }
}