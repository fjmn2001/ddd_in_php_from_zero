<?php

declare(strict_types=1);


namespace MN\Tests\Daniel\Courses\Application;


use MN\Daniel\Courses\Application\CourseCreator;
use MN\Daniel\Courses\Domain\Course;
use MN\Daniel\Courses\Domain\CourseRepository;
use PHPUnit\Framework\TestCase;

final class CourseCreatorTest extends TestCase
{
    /**
    *@test
    */
    public function it_should_create_a_valid_course(): void
    {
        $repository = $this->createMock(CourseRepository::class);
        $creator = new CourseCreator($repository);

        $id = "some-id";
        $name = "some-name";
        $duration = "some-duration";

//        $course = new Course($id, $name, $duration);
//        $repository->method('save')->with($course);

        $creator->__invoke($id, $name, $duration);
    }
}