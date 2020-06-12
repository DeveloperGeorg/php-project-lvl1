<?php

namespace BrainGames\Games\Calc;

use BrainGames\Model\Task;
use RuntimeException;

use function BrainGames\Games\Helpers\collectTasks;

/**
 * @return string
 */
function getDescription(): string
{
    return 'What is the result of the expression?';
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
        $operatorChoose = rand(1, 3);

        switch ($operatorChoose) {
            case 1:
                $operator = '+';
                $answer = $number1 + $number2;
                break;
            case 2:
                $operator = '-';
                $answer = $number1 - $number2;
                break;
            case 3:
                $operator = '*';
                $answer = $number1 * $number2;
                break;
            default:
                throw new RuntimeException('Something went wrong');
        }

        return new Task(
            "{$number1} {$operator} {$number2}",
            $answer
        );
    });
}
