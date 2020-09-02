<?php


declare(strict_types=1);


namespace MN\Francisco\Steps\Domain\Challenge;


use MN\Francisco\Shared\Domain\Lessons\LessonId;
use MN\Francisco\Steps\Domain\Step;
use MN\Francisco\Steps\Domain\StepId;
use MN\Francisco\Steps\Domain\StepTitle;

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