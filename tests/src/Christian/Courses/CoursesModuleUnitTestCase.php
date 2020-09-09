<?php


declare(strict_types=1);


namespace MN\Tests\Christian\Courses;


use MN\Christian\Courses\Domain\Course;
use MN\Christian\Courses\Domain\CourseRepository;
use MN\Shared\Domain\Bus\Event\EventBus;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

abstract class CoursesModuleUnitTestCase extends TestCase
{

    protected $repository;
    private $eventBus;

    /**
     * @return CourseRepository|\PHPUnit\Framework\MockObject\MockObject
     */
    protected function repository(): MockObject
    {
        return $this->repository = $this->repository ?: $this->createMock(CourseRepository::class);
    }

    /** @return EventBus|MockInterface */
    protected function eventBus(): MockInterface
    {
        return $this->eventBus = $this->eventBus ?: $this->mock(EventBus::class);
    }

    protected function mock(string $className): MockInterface
    {
        return Mockery::mock($className);
    }

    protected function shouldSave(Course $course): void
    {
        $this->repository()->method('save')->with($course);
    }
}