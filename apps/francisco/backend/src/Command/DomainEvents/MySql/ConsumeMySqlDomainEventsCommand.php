<?php

declare(strict_types=1);

namespace MN\Apps\Francisco\Backend\Command\DomainEvents\MySql;

use MN\Shared\Domain\Bus\Event\DomainEvent;
use MN\Shared\Infrastructure\Bus\Event\DomainEventSubscriberLocator;
use MN\Shared\Infrastructure\Bus\Event\MySql\MySqlDoctrineDomainEventsConsumer;
use MN\Shared\Infrastructure\Doctrine\DatabaseConnections;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use function Lambdish\Phunctional\pipe;

final class ConsumeMySqlDomainEventsCommand extends Command
{
    protected static $defaultName = 'mn:domain-events:mysql:consume';
    private $consumer;
    private $subscriberLocator;
    private $connections;

    public function __construct(
        MySqlDoctrineDomainEventsConsumer $consumer,
        DatabaseConnections $connections,
        DomainEventSubscriberLocator $subscriberLocator
    )
    {
        $this->consumer = $consumer;
        $this->subscriberLocator = $subscriberLocator;
        $this->connections = $connections;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Consume domain events from MySql')
            ->addArgument('quantity', InputArgument::REQUIRED, 'Quantity of events to process');
    }

    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $quantityEventsToProcess = (int)$input->getArgument('quantity');

        $consumer = pipe($this->consumer(), function () {
            $this->connections->clear();
        });

        $this->consumer->consume($consumer, $quantityEventsToProcess);
    }

    private function consumer(): callable
    {
        return function (DomainEvent $domainEvent) {
            $subscribers = $this->subscriberLocator->allSubscribedTo(get_class($domainEvent));

            foreach ($subscribers as $subscriber) {
                $subscriber($domainEvent);
            }
        };
    }
}