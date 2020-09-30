<?php

declare(strict_types=1);

namespace MN\Francisco\Courses\Application;

use MN\Francisco\Courses\Domain\CourseDuration;
use MN\Francisco\Courses\Domain\CourseId;
use MN\Francisco\Courses\Domain\CourseName;
use MN\Shared\Domain\Bus\Command\CommandHandler;

final class CreateCourseCommandHandler implements CommandHandler
{
    private $creator;

    public function __construct(CourseCreator $creator)
    {
        $this->creator = $creator;
    }

    public function __invoke(CreateCourseCommand $command)
    {
        $id = new CourseId($command->id());
        $name = new CourseName($command->name());
        $duration = new CourseDuration($command->duration());

        $this->creator->__invoke($id, $name, $duration);
    }
}