<?php


declare(strict_types=1);


namespace MN\Tests\Nelson\Courses\Application;



use MN\Nelson\Courses\Application\CourseCreator;
use MN\Nelson\Courses\Application\CreateCourseRequest;
use MN\Nelson\Courses\Domain\Course;
use MN\Nelson\Courses\Domain\CourseDuration;
use MN\Nelson\Courses\Domain\CourseId;
use MN\Nelson\Courses\Domain\CourseName;
use MN\Nelson\Courses\Domain\CourseRepository;
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

        $course = new Course(new CourseId($course_id->value()),
            new CourseName($name),
            new CourseDuration($duration));

        $creator->__invoke(new CreateCourseRequest($course_id->value(), $name, $duration));
    }
}
