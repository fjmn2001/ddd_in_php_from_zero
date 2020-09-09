<?php


declare(strict_types=1);


namespace MN\Tests\Pereira\Courses\Application;


use MN\Pereira\Courses\Application\CourseCreator;
use MN\Pereira\Courses\Application\CreateCourseRequest;
use MN\Tests\Pereira\Courses\CoursesModuleUnitTestCase;
use MN\Tests\Pereira\Courses\Domain\CourseMother;

final class CourseCreatorTest extends CoursesModuleUnitTestCase
{
    private $creator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->creator = new CourseCreator($this->repository());
    }

    /**
     * @test
     */
    public function it_should_create_a_valid_course(): void
    {
        $course = CourseMother::random();
        $this->shouldSave($course);

        $this->creator->__invoke(new CreateCourseRequest(
            $course->id()->value(),
            $course->name()->value(),
            $course->duration()->value()
        ));
    }

}