<?php


namespace MN\Shared\Domain\Bus\Event;


interface EventBus
{
    public function publish(DomainEvent ...$events): void;
}