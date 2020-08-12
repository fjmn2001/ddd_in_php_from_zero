<?php

declare(strict_types=1);


namespace MN\Tests\Joseq\Courses;


use MN\JoseQ\Courses\Application\CourseCreator;
use MN\JoseQ\Courses\Domain\Course;
use MN\JoseQ\Courses\Domain\CourseRepository;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

abstract class CoursesModuleUnitTestCase extends TestCase
{
    private $repository;

    /** @return CourseRepository | MockObject */
    protected function repository(): MockObject
    {
        return $this->repository = $this->repository ?: $this->createMock(CourseRepository::class);
    }

    protected function shouldSave(Course $course): void
    {
        $this->repository()->method('save')->with($course);
    }

    protected function courseCreator(): CourseCreator
    {
        return new CourseCreator($this->repository());
    }
}