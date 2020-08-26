<?php


declare(strict_types=1);


namespace MN\Tests\Gibmyx\Courses\Infrastructure\Persistence;


use MN\Tests\Gibmyx\Courses\CourseModuleInfrastrutureTestCase;
use MN\Tests\Gibmyx\Courses\Domain\CourseMother;

final class DoctrineCourseRepositoryTest extends CourseModuleInfrastrutureTestCase
{
    /**
     * @test
     */
    public function try_it_should_save_a_course()
    {
        $course = CourseMother::random();
        $this->repositoyy()->save($course);
    }
}