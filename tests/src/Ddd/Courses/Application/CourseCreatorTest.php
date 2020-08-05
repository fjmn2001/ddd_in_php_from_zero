<?php


declare(strict_types=1);


namespace MN\Tests\Ddd\Courses\Application;


use MN\Ddd\Courses\Application\CourseCreator;
use MN\Ddd\Courses\Domain\CourseRepository;
use MN\Ddd\Courses\Domain\Course;
use PHPUnit\Framework\TestCase;

final class CourseCreatorTest extends TestCase
{
    /**
     * @test
     * */
  public function it_should_create_a_valid_course():void
  {
        $respository = $this->createMock(CourseRepository::class);

        $creator = new CourseCreator($respository);

        $id = 'some-id';
        $name = 'some-name';
        $duration = 'some-duration';

        $course = new Course($id,$name,$duration);

        $respository->method('save')->with($course);

        $creator->__invoke($id,$name,$duration);
  }
}