<?php

namespace BrainGames;

use BrainGames\Model\Player;
use cli\Streams;

/**
 * Class Cli
 *
 * @package BrainGames
 */
class Cli implements GameRunner
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
    public function run(GamePlayableInterface $gamePlayable = null): void
    {
        $player = new Player();
        $this->cliStream->line('Welcome to the Brain Games!');
        $player->setName($this->cliStream->prompt('May I have your name?'));
        $this->cliStream->line("Hello, %s!", $player->getName());

        if ($gamePlayable !== null) {
            $gamePlayable->play($player);
        }
    }
}
