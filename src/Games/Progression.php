<?php

namespace BrainGames\Games\Progression;

use BrainGames\Model\Task;

use function BrainGames\Games\Helpers\collectTasks;

/**
 * @return string
 */
function getDescription(): string
{
    return 'What number is missing in the progression?';
}

/**
 * @param int $count
 * @param int $progressionLength
 *
 * @return Task[]
 */
function getTasks(int $count, int $progressionLength = 10): array
{
    return collectTasks($count, function () use ($progressionLength) {
        $startNumber = rand(1, 999);
        $progressionDifference = rand(1, 100);
        $progression = generateProgression(
            $startNumber,
            $progressionDifference,
            $progressionLength
        );
        $hiddenPosition = rand(1, count($progression)) - 1;
        $answer = $progression[$hiddenPosition];
        $progression[$hiddenPosition] = '..';
        return new Task(
            implode(' ', $progression),
            $answer
        );
    });
}

/**
 * @param int $start
 * @param int $progressionDifference
 * @param int $length
 *
 * @return array
 */
function generateProgression(int $start, int $progressionDifference, int $length): array
{
    $progression = [];
    $number = $start;
    $progression[] = $number;
    while (count($progression) < $length) {
        $number += $progressionDifference;
        $progression[] = $number;
    }

    return $progression;
}
