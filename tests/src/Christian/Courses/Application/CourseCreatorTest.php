<?php


declare(strict_types=1);


namespace MN\Tests\Christian\Courses\Application;


use MN\Christian\Courses\Application\CourseCreator;
use MN\Christian\Courses\Application\CreateCourseRequest;
use MN\Christian\Courses\Domain\Course;
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

        $id = 'some-id';
        $name = 'some-name';
        $duration = 'some-duration';

        $course = new Course($id, $name, $duration);
        $repository->method('save')->with($course);

        $creator->__invoke(new CreateCourseRequest($id, $name, $duration));
    }
}