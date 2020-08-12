<?php /** @noinspection PhpParamsInspection */


declare(strict_types=1);


namespace MN\Tests\Gibmyx\Courses\Application;


use MN\Gibmyx\Courses\Application\CourseCreator;
use MN\Gibmyx\Courses\Application\CreateCourseRequest;
use MN\Tests\Gibmyx\Courses\CoursesModuleUnitTestCase;
use MN\Tests\Gibmyx\Courses\Domain\CourseMother;

final class CourseCreatorTest extends CoursesModuleUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @test
     */
    public function it_should_create_at_valid_course() :void
    {
        $course = CourseMother::random();
        $this->shouldSave($course);

        $this->creator()->__invoke( new CreateCourseRequest(
            $course->id()->value(),
            $course->name()->value(),
            $course->duration()->value())
        );
    }
}
