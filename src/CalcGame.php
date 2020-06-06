<?php

namespace BrainGames;

use BrainGames\Model\Task;
use Exception;

/**
 * Class CalcGame
 *
 * @package BrainGames
 */
class CalcGame extends GameAbstract
{
    /**
     * {@inheritDoc}
     */
    public function getDescription(): string
    {
        return 'What is the result of the expression?';
    }

    /**
     * {@inheritDoc}
     */
    public function getTasks(int $count): array
    {
        return $this->collectTasks($count, function () {
            $operator = null;
            $answer = null;
            try {
                $number1 = random_int(1, 999);
                $number2 = random_int(1, 999);
                $operatorChoose = random_int(1, 3);
            } catch (Exception $e) {
                $number1 = rand(1, 999);
                $number2 = rand(1, 999);
                $operatorChoose = rand(1, 3);
            }
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
            }
            if ($operator === null || $answer == null) {
                return null;
            }
            return new Task(
                "{$number1} {$operator} {$number2}",
                $answer
            );
        });
    }
}
