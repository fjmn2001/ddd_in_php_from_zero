<?php


namespace MN\Tests\Shared\Infrastructure\Behat;


use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use MN\Shared\Infrastructure\Bus\Event\DomainEventJsonDeserializer;
use MN\Shared\Infrastructure\Bus\Event\InMemory\InMemorySymfonyEventBus;
use MN\Shared\Infrastructure\Doctrine\DatabaseConnections;

class ApplicationFeatureContext implements Context
{
    private $connections;
    private $bus;
    private $deserializer;

    public function __construct(
        //DatabaseConnections $connections,
        InMemorySymfonyEventBus $bus,
        DomainEventJsonDeserializer $deserializer
    )
    {
        //$this->connections = $connections;
        $this->bus = $bus;
        $this->deserializer = $deserializer;
    }

    /** @BeforeScenario */
    public function cleanEnvironment(): void
    {
//        $this->connections->clear();
//        $this->connections->truncate();
    }

    /**
     * @Given /^I send an event to the event bus:$/
     */
    public function iSendAnEventToTheEventBus(PyStringNode $event)
    {
        $domainEvent = $this->deserializer->deserialize($event->getRaw());

        $this->bus->publish($domainEvent);
    }
}