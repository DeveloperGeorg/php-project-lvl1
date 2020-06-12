<?php

namespace BrainGames\Games\Gcd;

use BrainGames\Model\Task;

use function BrainGames\Games\Helpers\collectTasks;

/**
 * @return string
 */
function getDescription(): string
{
    return 'Find the greatest common divisor of given numbers.';
}

/**
 * @param int $count
 *
 * @return Task[]
 */
function getTasks(int $count): array
{
    return collectTasks($count, function () {
        $number1 = rand(1, 999);
        $number2 = rand(1, 999);
        return new Task(
            "{$number1} {$number2}",
            gmp_gcd($number1, $number2)
        );
    });
}
