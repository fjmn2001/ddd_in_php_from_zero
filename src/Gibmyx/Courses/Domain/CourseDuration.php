<?php


declare(strict_types=1);


namespace MN\Gibmyx\Courses\Domain;


use MN\Shared\Domain\ValueObject\StringValueObject;

final class CourseDuration extends StringValueObject
{
    public function __construct(string $value)
    {
        $this->ensureLengthIsInferiorThan30Characters($value);
        parent::__construct($value);
    }

    private function ensureLengthIsInferiorThan30Characters(string $value) :void
    {
        if(strlen($value) > 30){
            throw new \InvalidArgumentException(sprintf("<%s>", $value));
        }
    }
}
