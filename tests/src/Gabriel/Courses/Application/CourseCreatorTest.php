<?php


declare(strict_types=1);


namespace MN\Tests\Gabriel\Courses\Application;


use MN\Gabriel\Courses\Application\CourseCreator;
use MN\Gabriel\Courses\Application\CreateCourseRequest;
use MN\Tests\Gabriel\Courses\CoursesModuleUnitTestCase;
use MN\Tests\Gabriel\Courses\Domain\CourseMother;
use MN\Shared\Infrastructure\Bus\Event\InMemory\InMemorySymfonyEventBus;

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
    public function it_should_create_a_valid_course(): void
    {
        $course = CourseMother::random();
        $this->shouldSave($course);

        $this->creator->__invoke(new CreateCourseRequest(
            $course->id()->value(),
            $course->name()->value(),
            $course->duration()->value()
        ));

        $this->repository->save($course);
    }

}