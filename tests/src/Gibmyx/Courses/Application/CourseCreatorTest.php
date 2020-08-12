<?php


declare(strict_types=1);


namespace MN\Tests\Gibmyx\Courses\Application;


use MN\Gibmyx\Courses\Application\CourseCreator;
use MN\Gibmyx\Courses\Application\CreateCourseRequest;
use MN\Gibmyx\Courses\Domain\Course;
use MN\Gibmyx\Courses\Domain\CourseDuration;
use MN\Gibmyx\Courses\Domain\CourseId;
use MN\Gibmyx\Courses\Domain\CourseName;
use MN\Gibmyx\Courses\Domain\CourseRepository;
use MN\Tests\Gibmyx\Courses\Domain\CourseMother;
use PHPUnit\Framework\TestCase;

final class CourseCreatorTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_create_at_valid_course() :void
    {
        $repository = $this->createMock(CourseRepository::class);
        $creator = new CourseCreator($repository);
        $course = CourseMother::random();
        $repository->method('save')->with($course);

        $creator->__invoke( new CreateCourseRequest(
            $course->id()->value(),
            $course->name()->value(),
            $course->duration()->value())
        );
    }
}