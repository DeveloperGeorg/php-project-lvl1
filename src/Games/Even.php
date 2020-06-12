<?php

namespace BrainGames\Games\Even;

use BrainGames\Model\Task;

use function BrainGames\Games\Helpers\collectTasks;

/**
 * @return string
 */
function getDescription(): string
{
    return 'Answer "yes" if the number is even, otherwise answer "no"';
}

/**
 * @param int $count
 *
 * @return array
 */
function getTasks(int $count): array
{
    return collectTasks($count, function () {
        $number = rand(1, 999);

        return new Task(
            $number,
            $number % 2 === 0 ? ANSWER_YES : ANSWER_NO
        );
    });
}
