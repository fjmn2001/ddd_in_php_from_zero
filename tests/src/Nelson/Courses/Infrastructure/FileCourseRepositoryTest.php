<?php


declare(strict_types=1);


namespace MN\Tests\Nelson\Courses\Infrastructure;

use MN\Nelson\Courses\Domain\Course;
use MN\Nelson\Courses\Domain\CourseDuration;
use MN\Nelson\Courses\Domain\CourseId;
use MN\Nelson\Courses\Domain\CourseName;
use MN\Nelson\Courses\Infrastructure\FileCourseRepository;
use PHPUnit\Framework\TestCase;




final class FileCourseRepositoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_save_a_course(): void
    {
        $repository = new FileCourseRepository();
        $course = new CourseMother::random();
//        $course = new Course(new CourseId(CourseId::random()->value()), new CourseName('name'), new CourseDuration('duration'));

        $repository->save($course);
    }

    /**
     * @test
     */
    public function it_should_return_an_existing_course(): void
    {
        $course_id = CourseId::random();
        $repository = new FileCourseRepository();
        $course = new Course(new CourseId($course_id->value()), new CourseName('name'), new CourseDuration('duration'));

        $repository->save($course);

        $this->assertEquals($course, $repository->search(new CourseId($course_id->value())));
    }

    /**
     * @test
     */
    public function it_should_not_return_an_existing_course(): void
    {
        $course_id = CourseId::random();
        $repository = new FileCourseRepository();
        $this->assertNull($repository->search(new CourseId($course_id->value())));
    }
}
