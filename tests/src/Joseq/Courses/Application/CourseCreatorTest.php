<?php
/**
 * Created by PhpStorm.
 * User: trabajo
 * Date: 01/08/20
 * Time: 10:39 AM
 */

namespace MN\Tests\Joseq\Courses\Application;


use MN\JoseQ\Courses\Application\CourseCreator;
use MN\JoseQ\Courses\Application\CreateCourseRequest;
use MN\Shared\Infrastructure\Bus\Event\InMemory\InMemorySymfonyEventBus;
use MN\Tests\Joseq\Courses\CoursesModuleUnitTestCase;
use MN\Tests\Joseq\Courses\Domain\CourseMother;


class CourseCreatorTest extends CoursesModuleUnitTestCase
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
    }
}