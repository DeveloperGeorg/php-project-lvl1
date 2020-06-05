<?php

namespace BrainGames;

use BrainGames\Model\Player;
use cli\Streams;

/**
 * Trait GameFlowTrait
 *
 * @property Streams $cliStream
 *
 * @package BrainGames
 */
trait GameFlowTrait
{
    /**
     * @param $tasksAndAnswers
     * @param Player $player
     */
    protected function flow($tasksAndAnswers, Player $player)
    {
        $finisGame = false;
        $rightAnswersCounter = 0;
        foreach ($tasksAndAnswers as $taskAndAnswer) {
            if ($finisGame === true) {
                break;
            }
            $this->cliStream->line("Question: {$taskAndAnswer['question']}");
            $answer = $this->cliStream->prompt('Your answer');
            if ($taskAndAnswer['answer'] == $answer) {
                $this->cliStream->line('Correct!');
                $rightAnswersCounter++;
            } else {
                $this->cliStream->line(
                    "'{$answer}' is wrong answer ;(. Correct answer was '{$taskAndAnswer['answer']}'."
                );
                $finisGame = true;
            }
        }
        if ($rightAnswersCounter === $this->getMaxRightAnswersCount()) {
            $this->cliStream->line("Congratulations, {$player->getName()}!");
        } else {
            $this->cliStream->line("Let's try again, {$player->getName()}!");
        }
    }

    /**
     * @return int
     */
    protected function getMaxRightAnswersCount()
    {
        return 3;
    }
}
