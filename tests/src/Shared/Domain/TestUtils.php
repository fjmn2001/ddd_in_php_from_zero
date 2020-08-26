<?php


declare(strict_types=1);


namespace MN\Tests\Shared\Domain;


use MN\Tests\Shared\Infrastructure\Mockery\MNMatcherIsSimilar;
use MN\Tests\Shared\Infrastructure\PhpUnit\Constraint\MNConstraintIsSimilar;

final class TestUtils
{
    public static function isSimilar($expected, $actual): bool
    {
        $constraint = new MNConstraintIsSimilar($expected);

        return $constraint->evaluate($actual, '', true);
    }

    public static function assertSimilar($expected, $actual): void
    {
        $constraint = new MNConstraintIsSimilar($expected);

        $constraint->evaluate($actual);
    }

    public static function similarTo($value, $delta = 0.0): MNMatcherIsSimilar
    {
        return new MNMatcherIsSimilar($value, $delta);
    }
}