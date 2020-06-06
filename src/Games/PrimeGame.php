<?php

namespace BrainGames\Games;

use BrainGames\Model\Task;
use Exception;

/**
 * Class PrimeGame
 *
 * @package BrainGames
 */
class PrimeGame extends GameAbstract
{
    private const ANSWER_YES = 'yes';
    private const ANSWER_NO = 'no';

    /**
     * {@inheritDoc}
     */
    public function getDescription(): string
    {
        return 'Answer "yes" if given number is prime. Otherwise answer "no".';
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
            return new  Task(
                $number,
                gmp_prob_prime($number) !== 0 ? static::ANSWER_YES : static::ANSWER_NO
            );
        });
    }
}
