<?php /** @noinspection PhpParamsInspection */


declare(strict_types=1);


namespace MN\Tests\Gibmyx\Courses\Application;


use MN\Gibmyx\Courses\Application\CourseCreator;
use MN\Gibmyx\Courses\Application\CreateCourseRequest;
use MN\Tests\Gibmyx\Courses\CoursesModuleUnitTestCase;
use MN\Tests\Gibmyx\Courses\Domain\CourseCreatedDomainEventMother;
use MN\Tests\Gibmyx\Courses\Domain\CourseMother;

final class CourseCreatorTest extends CoursesModuleUnitTestCase
{
    private $creator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->creator = new CourseCreator($this->repository(), $this->eventBus());
    }

    /**
     * @test
     */
    public function it_should_create_at_valid_course() :void
    {
        $course = CourseMother::random();
        $domainEvent = CourseCreatedDomainEventMother::fromCourse($course);

        $this->shouldSave($course);
        $this->shouldPublishDomainEvent($domainEvent);

        $this->creator->__invoke(new CreateCourseRequest(
            $course->id()->value(),
            $course->name()->value(),
            $course->duration()->value()
        ));
    }
}
