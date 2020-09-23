<?php


declare(strict_types=1);


namespace MN\Gabriel\Steps\Domain;


use MN\Gabriel\Shared\Domain\Lessons\LessonId;
use MN\Shared\Domain\Aggregate\AggregateRoot;

abstract class Step extends AggregateRoot
{
    private $id;
    private $lessonId;
    private $stepTitle;

    public function __construct(
        StepId $id,
        LessonId $lessonId,
        StepTitle $stepTitle
    )
    {
        $this->id = $id;
        $this->lessonId = $lessonId;
        $this->stepTitle = $stepTitle;
    }

    public function id(): StepId
    {
        return $this->id;
    }

    public function lessonId(): LessonId
    {
        return $this->lessonId;
    }

    public function stepTitle(): StepTitle
    {
        return $this->stepTitle;
    }
}