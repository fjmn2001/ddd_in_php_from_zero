<?php

declare(strict_types=1);


namespace MN\Tests\Gibmyx\Courses;


use MN\Gibmyx\Courses\Application\CourseCreator;
use MN\Gibmyx\Courses\Domain\Course;
use MN\Gibmyx\Courses\Domain\CourseRepository;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

abstract class CoursesModuleUnitTestCase extends TestCase
{

    private $repository;

    /**
     * @param Course $course
     */
    public function shouldSave(Course $course): void
    {
        $this->repository()->method('save')->with($course);
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
        return new CourseCreator($this->repository());
    }
}