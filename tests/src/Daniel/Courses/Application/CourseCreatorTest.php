<?php

declare(strict_types=1);


namespace MN\Tests\Daniel\Courses\Application;


use MN\Daniel\Courses\Application\CreateCourseRequest;
use MN\Tests\Daniel\Courses\CourseModuleUnitCaseTest;
use MN\Tests\Daniel\Courses\Domain\CourseMother;

final class CourseCreatorTest extends CourseModuleUnitCaseTest
{
    protected function setUp()
    {
        parent::setUp();
    }

    /**
    *@test
    */
    public function it_should_create_a_valid_course(): void
    {
        $course = CourseMother::random();
        $this->shouldSave($course);

        $this->creator()->__invoke(new CreateCourseRequest(
            $course->id()->value(),
            $course->name()->value(),
            $course->duration()->value()
        ));
    }

}