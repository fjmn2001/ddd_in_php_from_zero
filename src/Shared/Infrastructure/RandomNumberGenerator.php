<?php
/**
 * Created by PhpStorm.
 * User: trabajo
 * Date: 18/07/20
 * Time: 09:25 AM
 */

namespace MN\Shared\Infrastructure;


final class RandomNumberGenerator
{
    /**
     * @return int
     * @throws \Exception
     */
    public function generate(): int
    {
        return random_int(1,5);
    }
}