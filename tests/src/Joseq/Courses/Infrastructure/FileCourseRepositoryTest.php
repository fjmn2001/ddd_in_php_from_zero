<?php


namespace MN\Tests\Joseq\Courses\Infrastructure;


use MN\JoseQ\Courses\Domain\Course;
use MN\JoseQ\Courses\Domain\CourseDuration;
use MN\JoseQ\Courses\Domain\CourseId;
use MN\JoseQ\Courses\Domain\CourseName;
use MN\JoseQ\Courses\Infrastructure\FileCourseRepository;
use MN\Shared\Domain\ValueObject\Uuid;
use MN\Tests\Joseq\Courses\Domain\CourseMother;
use PHPUnit\Framework\TestCase;

class FileCourseRepositoryTest extends TestCase
{
        /**
         @test
         */
    public function it_should_save_a_course(): void
    {
        $course_id = CourseId::random();
        $course = CourseMOther::random();

        $repository->save($course);
    }

    public function it_should_return_an_existing_course(): void
    {
        $course_id = CourseId::random();
        $repository = new FileCourseRepository();
        $course = new Course(new CourseId($course_id->value()), new CourseName('name'), new CourseDuration('duration'));

        $repository->save($course);

        $this->assertEquals($course, $repository->search(new CourseId($course_id->value())));
    }

    public function it_should__not_return_an_existing_course(): void
    {
        $course_id = CourseId::random();
        $repository = new FileCourseRepository();
        $this->assertNull($repository->search(new CourseId($course_id->value())));
    }
}