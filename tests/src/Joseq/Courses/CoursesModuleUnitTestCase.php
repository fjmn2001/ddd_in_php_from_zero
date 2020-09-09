<?php

declare(strict_types=1);


namespace MN\Tests\Joseq\Courses;


use MN\JoseQ\Courses\Application\CourseCreator;
use MN\JoseQ\Courses\Domain\Course;
use MN\JoseQ\Courses\Domain\CourseRepository;
use MN\Shared\Domain\Bus\Event\EventBus;
use MN\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\MockObject\MockObject;

abstract class CoursesModuleUnitTestCase extends UnitTestCase
{
    private $repository;
    private $eventBus;

    public function shouldSave(Course $course): void
    {
        $this->repository()->method('save')->with($course);
    }

    protected function eventBus(): MockInterface
    {
        return $this->eventBus = $this->eventBus ?: $this->mock(EventBus::class);
    }

    protected function mock(string $className): MockInterface
    {
        return Mockery::mock($className);
    }

    protected function repository(): MockObject
    {
        return $this->repository = $this->repository ?: $this->createMock(CourseRepository::class);
    }

    protected function creator() : CourseCreator
    {
        return new CourseCreator($this->repository());
    }
}