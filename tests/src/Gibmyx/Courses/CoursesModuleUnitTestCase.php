<?php

declare(strict_types=1);


namespace MN\Tests\Gibmyx\Courses;


use MN\Gibmyx\Courses\Application\CourseCreator;
use MN\Gibmyx\Courses\Domain\Course;
use MN\Gibmyx\Courses\Domain\CourseRepository;
use MN\Shared\Domain\Bus\Event\EventBus;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

abstract class CoursesModuleUnitTestCase extends TestCase
{

    private $repository;
    private $eventBus;

    /**
     * @param Course $course
     */
    public function shouldSave(Course $course): void
    {
        $this->repository()->method('save')->with($course);
    }

    /** @return EventBus|MockInterface*/
    protected function eventBus(): MockInterface
    {
        return $this->eventBus = $this->eventBus ?: $this->mock(EventBus::class);
    }

    protected function mock(string $className): MockInterface
    {
        return Mockery::mock($className);
    }

    /**
     * @return CourseRepository|MockObject
     */
    protected function repository(): MockObject
    {
        return $this->repository = $this->repository ?: $this->createMock(CourseRepository::class);
    }

    protected function creator() : CourseCreator
    {
        return new CourseCreator($this->repository(), $this->eventBus());
    }
}