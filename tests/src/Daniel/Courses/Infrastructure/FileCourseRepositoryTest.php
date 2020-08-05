<?php

declare(strict_types=1);


namespace MN\Tests\Daniel\Courses\Infrastructure;


use MN\Daniel\Courses\Domain\Course;
use MN\Daniel\Courses\Domain\CourseDuration;
use MN\Daniel\Courses\Domain\CourseId;
use MN\Daniel\Courses\Domain\CourseName;
use MN\Daniel\Courses\Infrastructure\FileCourseRepository;
use PHPUnit\Framework\TestCase;

final class FileCourseRepositoryTest extends TestCase
{
    /**
    *@test
     */
    public function it_should_save_a_valid_course(): void
    {
        $repository = new FileCourseRepository();
        $course = new Course(CourseId::random(),
                            new CourseName('name'),
                            new CourseDuration('duration'));

        $repository->save($course);
    }

    /**
     *@test
     */
    public function it_should_return_an_existing_course(): void
    {
        $course_id = CourseId::random();
        $repository = new FileCourseRepository();
        $course = new Course($course_id,
                            new CourseName('name'),
                            new CourseDuration('duration'));

        $repository->save($course);

        $this->assertEquals($course, $repository->search($course_id));
    }

    /**
     *@test
     */
    public function it_should_not_return_an_existing_course(): void
    {
        $course_id = CourseId::random();
        $repository = new FileCourseRepository();
        $this->assertNull($repository->search($course_id));
    }
}