<?php

declare(strict_types=1);


namespace MN\Gabriel\Courses\Domain;


use MN\Shared\Domain\ValueObject\StringValueObject;

final class CourseName extends StringValueObject
{
    public function __construct(string $value)
    {
        $this->ensureLengthIsInferiorThan30Characters($value);

        parent::__construct($value);
    }

    private function ensureLengthIsInferiorThan30Characters(string $value)
    {
        if(strlen($value) > 30){
            throw new \InvalidArgumentException(sprintf("<%s>", $value));
        }
    }
}