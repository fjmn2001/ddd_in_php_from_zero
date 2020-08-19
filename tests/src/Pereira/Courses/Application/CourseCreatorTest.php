<?php


declare(strict_types=1);


namespace MN\Tests\Pereira\Courses\Application;


use MN\Pereira\Courses\Application\CreateCourseRequest;
use MN\Pereira\Courses\Domain\CourseDuration;
use MN\Pereira\Courses\Domain\CourseId;
use MN\Pereira\Courses\Domain\CourseName;
use MN\Pereira\Courses\Application\CourseCreator;
use MN\Pereira\Courses\Domain\Course;
use MN\Pereira\Courses\Domain\CourseRepository;
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