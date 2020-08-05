<?php


namespace MN\Pereira\Courses\Infrastructure;


use MN\Pereira\Courses\Domain\Course;
use MN\Pereira\Courses\Domain\CourseRepository;

class FileCourseRepository implements CourseRepository
{
    private const FILE_PATH = __DIR__ . '/courses';

    public function save(Course $course): void
    {
        file_put_contents($this->fileName($course->id()), serialize($course));
    }

    public function search(string $id): ?Course
    {
        return file_exists($this->fileName($id))
            ? unserialize(file_get_contents($this->fileName($id)))
            : null;
    }

    private function fileName(string $id): string
    {
        return sprintf('%s.%s.repo', self::FILE_PATH, $id);
    }
}