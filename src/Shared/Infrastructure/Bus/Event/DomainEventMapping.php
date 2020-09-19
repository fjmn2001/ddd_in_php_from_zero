<?php


namespace MN\Shared\Infrastructure\Bus\Event;


use MN\Shared\Domain\Bus\Event\DomainEventSubscriber;
use function Lambdish\Phunctional\reduce;
use function Lambdish\Phunctional\reindex;

class DomainEventMapping
{
    private $mapping;

    public function __construct(iterable $mapping)
    {
        $this->mapping = reduce($this->eventsExtractor(), $mapping, []);
    }

    public function for(string $name)
    {
        if (!isset($this->mapping[$name])) {
            throw new \RuntimeException("The Domain Event Class for <$name> doesn't exists or have no subscribers");
        }

        return $this->mapping[$name];
    }

    public function all()
    {
        return $this->mapping;
    }

    private function eventsExtractor(): callable
    {
        return function (array $mapping, DomainEventSubscriber $subscriber) {
            return array_merge(
                $mapping,
                reindex(
                    $this->eventNameExtractor(),
                    $subscriber::subscribedTo()
                )
            );
        };
    }

    private function eventNameExtractor(): callable
    {
        return static function ($eventClass): string {
            return $eventClass::eventName();
        };
    }
}