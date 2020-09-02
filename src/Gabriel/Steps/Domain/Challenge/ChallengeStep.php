<?php


declare(strict_types=1);


namespace MN\Gabriel\Steps\Domain\Challenge;


use MN\Gabriel\Shared\Domain\Lessons\LessonId;
use MN\Gabriel\Steps\Domain\Step;
use MN\Gabriel\Steps\Domain\StepId;
use MN\Gabriel\Steps\Domain\StepTitle;

final class ChallengeStep extends Step
{
    private $statement;

    public function __construct(StepId $id, LessonId $lessonId, StepTitle $stepTitle, ChallengeStepStatement $statement)
    {
        parent::__construct($id, $lessonId, $stepTitle);
        $this->statement = $statement;
    }

    public function statement(): ChallengeStepStatement
    {
        return $this->statement;
    }
}