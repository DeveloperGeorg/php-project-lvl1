<?php

namespace BrainGames;

use BrainGames\Model\Task;
use Exception;

use function gmp_gcd;

/**
 * Class GcdGame
 *
 * @package BrainGames
 */
class GcdGame extends GameAbstract
{

    /**
     * {@inheritDoc}
     */
    public function getDescription(): string
    {
        return 'Find the greatest common divisor of given numbers.';
    }

    /**
     * {@inheritDoc}
     */
    public function getTasks(int $count): array
    {
        return $this->collectTasks($count, function () {
            try {
                $number1 = random_int(1, 999);
                $number2 = random_int(1, 999);
            } catch (Exception $e) {
                $number1 = rand(1, 999);
                $number2 = rand(1, 999);
            }
            return new Task(
                "{$number1} {$number2}",
                gmp_gcd($number1, $number2)
            );
        });
    }
}
