<?php


declare(strict_types=1);


namespace MN\Tests\Shared\Infrastructure\Mockery;


use MN\Tests\Shared\Infrastructure\PhpUnit\Constraint\MNConstraintIsSimilar;
use Mockery\Matcher\MatcherAbstract;

final class MNMatcherIsSimilar extends MatcherAbstract
{
    private $constraint;

    public function __construct($value, $delta = 0.0)
    {
        parent::__construct($value);

        $this->constraint = new MNConstraintIsSimilar($value, $delta);
    }

    public function match(&$actual): bool
    {
        return $this->constraint->evaluate($actual, '', true);
    }

    public function __toString(): string
    {
        return 'Is similar';
    }
}