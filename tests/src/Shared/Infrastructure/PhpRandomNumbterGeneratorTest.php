<?php


namespace MN\Tests\Shared\Infrastructure;


use MN\Shared\Infrastructure\PhpRandomNumberGenerator;
use PHPUnit\Framework\TestCase;

final class PhpRandomNumbterGeneratorTest extends TestCase
{
    /** @test */
    public function it_should_generate_a_random_number() : void
    {
        $generate = new PhpRandomNumberGenerator();
        $this->assertIsNumeric($generate->generate());
    }
}
