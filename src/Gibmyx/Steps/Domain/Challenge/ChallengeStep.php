<?php


declare(strict_types=1);


namespace MN\Gibmyx\Steps\Domain\Challenge;


use MN\Gibmyx\Shared\Domain\Lessons\LessonId;
use MN\Gibmyx\Steps\Domain\Step;
use MN\Gibmyx\Steps\Domain\StepId;
use MN\Gibmyx\Steps\Domain\StepTitle;

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