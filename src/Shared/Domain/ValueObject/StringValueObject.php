<?php


declare(strict_types=1);


namespace MN\Shared\Domain\ValueObject;


class StringValueObject
{
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value();
    }
}