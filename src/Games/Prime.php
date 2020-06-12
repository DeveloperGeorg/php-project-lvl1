<?php

namespace BrainGames\Games\Prime;

use BrainGames\Model\Task;

use function BrainGames\Games\Helpers\collectTasks;

/**
 * @return string
 */
function getDescription(): string
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

/**
 * @param int $count
 *
 * @return Task[]
 */
function getTasks(int $count): array
{
    return collectTasks($count, function () {
        $number = rand(1, 999);

        return new  Task(
            $number,
            gmp_prob_prime($number) !== 0 ? ANSWER_YES : ANSWER_NO
        );
    });
}
