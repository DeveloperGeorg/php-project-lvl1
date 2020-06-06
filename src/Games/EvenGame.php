<?php

namespace BrainGames\Games;

use BrainGames\Model\Task;
use Exception;

/**
 * Class EvenGame
 *
 * @package BrainGames
 */
class EvenGame extends GameAbstract
{
    private const ANSWER_YES = 'yes';
    private const ANSWER_NO = 'no';

    /**
     * {@inheritDoc}
     */
    public function getDescription(): string
    {
        return 'Answer "yes" if the number is even, otherwise answer "no"';
    }

    /**
     * {@inheritDoc}
     */
    public function getTasks(int $count): array
    {
        return $this->collectTasks($count, function () {
            try {
                $number = random_int(1, 999);
            } catch (Exception $e) {
                $number = rand(1, 999);
            }
            return new Task(
                $number,
                $number % 2 === 0 ? static::ANSWER_YES : static::ANSWER_NO
            );
        });
    }
}
