<?php

declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: trabajo
 * Date: 25/07/20
 * Time: 12:56 PM
 */

namespace MN\Tests\Shared\Infrastructure;

use MN\Shared\Infrastructure\PhpRandomNumberGenerator;
use PHPUnit\Framework\TestCase;


final class PhpRandomNumberGeneratorTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_generate_a_random_rumber(): void

    {
        $generator = new PhpRandomNumberGenerator();
        $this->assertIsNumeric($generator->generate());
    }

}