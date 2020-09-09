<?php

declare(strict_types=1);


namespace MN\Tests\Daniel\Courses;


use MN\Daniel\Courses\Domain\Course;
use MN\Daniel\Courses\Domain\CourseId;
use MN\Daniel\Courses\Domain\CourseRepository;
use MN\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;

abstract class CourseModuleUnitTestCase extends UnitTestCase
{
    protected $repository;

    protected function shouldSave(Course $course): void
    {
        $this->repository()
            ->shouldReceive('save')
            ->with($this->similarTo($course))
            ->once()
            ->andReturnNull();
    }

    protected function shouldSearch(CourseId $id, ?Course $course): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->with($this->similarTo($id))
            ->once()
            ->andReturn($course);
    }

    /**
     * @return CourseRepository|MockInterface
     */
    protected function repository(): MockInterface
    {
        return $this->repository = $this->repository ?: $this->mock(CourseRepository::class);
    }
}