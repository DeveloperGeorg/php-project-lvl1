<?php

namespace BrainGames;

use BrainGames\Games\GameAbstract;
use BrainGames\Model\Player;
use cli\Streams;

/**
 * Class GameEngine
 *
 * @package BrainGames
 */
class CliGameEngine implements GameEngineInterface
{
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
    public function play(GameAbstract $game, Player $player, int $maxTasksCount = 3)
    {
        $tasksAndAnswers = $game->getTasks($maxTasksCount);
        $finisGame = false;
        $rightAnswersCounter = 0;
        foreach ($tasksAndAnswers as $taskAndAnswer) {
            if ($finisGame === true) {
                break;
            }
            $this->cliStream->line("Question: {$taskAndAnswer->getQuestion()}");
            $answer = $this->cliStream->prompt('Your answer');
            if ($taskAndAnswer->getAnswer() == $answer) {
                $this->cliStream->line('Correct!');
                $rightAnswersCounter++;
            } else {
                $this->cliStream->line(
                    "'{$answer}' is wrong answer ;(. Correct answer was '{$taskAndAnswer->getAnswer()}'."
                );
                $finisGame = true;
            }
        }
        if ($rightAnswersCounter === count($tasksAndAnswers)) {
            $this->cliStream->line("Congratulations, {$player->getName()}!");
        } else {
            $this->cliStream->line("Let's try again, {$player->getName()}!");
        }
    }
}
