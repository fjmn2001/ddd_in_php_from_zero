<?php


declare(strict_types=1);


namespace MN\Francisco\Courses\Infrastructure;


use MN\Francisco\Courses\Domain\Course;
use MN\Francisco\Courses\Domain\CourseId;
use MN\Francisco\Courses\Domain\CourseRepository;

final class FileCourseRepository implements CourseRepository
{
    private const FILE_PATH = __DIR__ . '/courses';

    public function save(Course $course): void
    {
        file_put_contents($this->fileName($course->id()->value()), serialize($course));
    }

    public function search(CourseId $id): ?Course
    {
        return file_exists($this->fileName($id->value()))
            ? unserialize(file_get_contents($this->fileName($id->value())))
            : null;
    }

    private function fileName(string $id): string
    {
        return sprintf('%s.%s.repo', self::FILE_PATH, $id);
    }
}