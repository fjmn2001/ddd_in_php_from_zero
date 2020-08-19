<?php


declare(strict_types=1);


namespace MN\Tests\Christian\Courses;


use MN\Christian\Courses\Domain\Course;
use MN\Christian\Courses\Domain\CourseRepository;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

abstract class CoursesModuleUnitTestCase extends TestCase
{

    protected $repository;

    /**
     * @return CourseRepository|\PHPUnit\Framework\MockObject\MockObject
     */
    protected function repository(): MockObject
    {
        return $this->repository = $this->repository ?: $this->createMock(CourseRepository::class);
    }

    protected function shouldSave(Course $course): void
    {
        $this->repository()->method('save')->with($course);
    }
}