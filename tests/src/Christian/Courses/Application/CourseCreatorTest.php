<?php


declare(strict_types=1);


namespace MN\Tests\Christian\Courses\Application;


use MN\Christian\Courses\Application\CourseCreator;
use MN\Christian\Courses\Application\CreateCourseRequest;
use MN\Christian\Courses\Domain\Course;
use MN\Christian\Courses\Domain\CourseDuration;
use MN\Christian\Courses\Domain\CourseId;
use MN\Christian\Courses\Domain\CourseName;
use MN\Christian\Courses\Domain\CourseRepository;
use PHPUnit\Framework\TestCase;

final class CourseCreatorTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_create_a_valid_course(): void
    {
        $repository = $this->createMock(CourseRepository::class);
        $creator = new CourseCreator($repository);

        $course_id = CourseId::random();
        $name = 'some-name';
        $duration = 'some-duration';

        $course = new Course(new CourseId($course_id->value()), new CourseName($name), new CourseDuration($duration));
        $repository->method('save')->with($course);

        $creator->__invoke(new CreateCourseRequest($course_id->value(), $name, $duration));
    }
}