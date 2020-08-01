<?php
/**
 * Created by PhpStorm.
 * User: trabajo
 * Date: 01/08/20
 * Time: 10:58 AM
 */

namespace MN\Joseq\Courses\Application;


use MN\Joseq\Courses\Domain\Course;
use MN\Joseq\Courses\Domain\CourseRepository;

class CourseCreator
{

    private $repository;

    public function __construct(CourseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $id, string $name, string $duration): void
    {
        $course = new Course($id, $name, $duration);
        $this->repository->save($course);
    }
}