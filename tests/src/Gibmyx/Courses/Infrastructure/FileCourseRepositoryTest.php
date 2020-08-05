<?php

declare(strict_types=1);


namespace MN\Tests\Gibmyx\Courses\Infrastructure;


use MN\Gibmyx\Courses\Domain\Course;
use MN\Gibmyx\Courses\Infrastructure\FileCourseRepository;
use PHPUnit\Framework\TestCase;

final class FileCourseRepositoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_save_a_course(): void
    {
        $repository = new FileCourseRepository();
        $course = new Course('id', 'name', 'duration');

        $repository->save($course);
    }

    /**
     * @test
     */
    public function it_should_return_a_existing_course(): void
    {
        $course_id = (string)rand(1, 100);
        $repository = new FileCourseRepository();
        $course = new Course($course_id, 'name', 'duration');

        $repository->save($course);

        $this->assertEquals($course, $repository->search($course_id));
    }

    /**
     * @test
     */
    public function it_should_not_return_a_existing_course(): void
    {
        $repository = new FileCourseRepository();
        $this->assertNull($repository->search('no_exists_course'));
    }

}