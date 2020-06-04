<?php

namespace BrainGames;

use BrainGames\Model\Player;
use cli\Streams;
use Exception;

/**
 * Class EvenGame
 *
 * @package BrainGames
 */
class EvenGame implements GamePlayableInterface
{
    private const ANSWER_YES = 'yes';
    private const ANSWER_NO = 'no';
    private const MAX_RIGHT_ANSWERS_COUNTER = 3;
    /**
     * @var Streams
     */
    private $cliStream;

    /**
     * Cli constructor.
     *
     */
    public function __construct()
    {
        $this->cliStream = new Streams();
    }

    /**
     * {@inheritDoc}
     */
    public function play(Player $player)
    {
        $this->cliStream->line('Answer "yes" if the number is even, otherwise answer "no"');
        $tasksAndAnswers = $this->getTaskAndAnswers(static::MAX_RIGHT_ANSWERS_COUNTER);
        $finisGame = false;
        $rightAnswersCounter = 0;
        foreach ($tasksAndAnswers as $taskAndAnswer) {
            if ($finisGame === true) {
                break;
            }
            $this->cliStream->line("Question: {$taskAndAnswer['number']}");
            $answer = $this->cliStream->prompt('Your answer');
            if ($taskAndAnswer['answer'] === $answer) {
                $this->cliStream->line('Correct!');
                $rightAnswersCounter++;
            } else {
                $this->cliStream->line(
                    "'{$answer}' is wrong answer ;(. Correct answer was '{$taskAndAnswer['answer']}'."
                );
                $finisGame = true;
            }
        }
        if ($rightAnswersCounter === static::MAX_RIGHT_ANSWERS_COUNTER) {
            $this->cliStream->line("Congratulations, {$player->getName()}!");
        } else {
            $this->cliStream->line("Let's try again, {$player->getName()}!");
        }
    }

    /**
     * @param int $count
     *
     * @return array
     */
    private function getTaskAndAnswers(int $count = 3)
    {
        $return = [];
        $taskCounter = 0;
        while ($taskCounter < $count) {
            try {
                $number = random_int(1, 999);
            } catch (Exception $e) {
                $number = rand(1, 999);
            }
            $return[] = [
                'number' => $number,
                'answer' => $number % 2 === 0 ? static::ANSWER_YES : static::ANSWER_NO
            ];
            $taskCounter++;
        }

        return $return;
    }
}
