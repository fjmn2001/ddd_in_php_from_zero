<?php
/**
 * Created by PhpStorm.
 * User: trabajo
 * Date: 18/07/20
 * Time: 11:28 AM
 */

namespace MN\Tests\Shared\Infrastructure\Mink;


use Behat\Gherkin\Node\PyStringNode;
use Symfony\Component\DomCrawler\Crawler;

class MinkSessionRequestHelper
{
#mink session request
    /** @var MinkHelper */
    private $sessionHelper;

    public function __construct($sessionHelper)
    {
        $this->sessionHelper = $sessionHelper;
    }

    public function sendRequest($method, $url, array $optionalParams = []): void
    {
        $this->request($method, $url, $optionalParams);
    }

    public function sendRequestWithPyStringNode($method, $url, PyStringNode $body): void
    {
        $this->request($method, $url, ['content' => $body->getRaw()]);
    }

    public function request($method, $url, array $optionalParams = []): Crawler
    {
        return $this->sessionHelper->sendRequest($method, $url, $optionalParams);
    }
}