<?php

declare(strict_types=1);


namespace MN\Daniel\Courses\Infrastructure;


use MN\Daniel\Courses\Domain\Course;
use MN\Daniel\Courses\Domain\CourseRepository;

final class FileCourseRepository implements CourseRepository
{
    public function save(Course $course): void
    {
        //TODO: Implement save method
    }
}