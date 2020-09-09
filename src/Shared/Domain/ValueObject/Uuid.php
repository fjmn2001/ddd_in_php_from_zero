<?php


declare(strict_types=1);


namespace MN\Shared\Domain\ValueObject;


use Ramsey\Uuid\Uuid as RamseyUuid;

class Uuid
{
    protected $value;

    public function __construct(string $value)
    {
        $this->ensureIsValidUuid($value);
        
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public static function random(): self
    {
        return new self(RamseyUuid::uuid4()->toString());
    }

    public function equals(Uuid $other): bool
    {
        return $this->value() === $other->value();
    }

    private function ensureIsValidUuid(string $value): void
    {
        if(!RamseyUuid::isValid($value)){
            throw new \Exception(sprintf("<%s> does not allow the value <%s>", static::class, $value));
        }
    }

    public function __toString(): string
    {
        return $this->value();
    }
}