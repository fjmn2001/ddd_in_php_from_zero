<?php

declare(strict_types=1);

namespace MN\Shared\Infrastructure\Bus\Event;

use MN\Shared\Domain\Bus\Event\DomainEventSubscriber;
use MN\Shared\Infrastructure\Bus\CallableFirstParameterExtractor;
use Traversable;

final class DomainEventSubscriberLocator
{
    private $mapping;

    public function __construct(Traversable $mapping)
    {
        $this->mapping = iterator_to_array($mapping);
    }

    public function allSubscribedTo(string $eventClass): array
    {
        $formatted = CallableFirstParameterExtractor::forPipedCallables($this->mapping);

        return $formatted[$eventClass];
    }

//    public function withRabbitMqQueueNamed(string $queueName): DomainEventSubscriber
//    {
//        $subscriber = search(
//            static fn(DomainEventSubscriber $subscriber) => RabbitMqQueueNameFormatter::format($subscriber) ===
//                $queueName,
//            $this->mapping
//        );
//
//        if (null === $subscriber) {
//            throw new RuntimeException("There are no subscribers for the <$queueName> queue");
//        }
//
//        return $subscriber;
//    }

    public function all(): array
    {
        return $this->mapping;
    }
}