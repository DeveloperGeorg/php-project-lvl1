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
     * @var CliGameEngine
     */
    private $gameEngine;

    /**
     * Cli constructor.
     *
     */
    public function __construct()
    {
        $this->cliStream = new Streams();
        $this->gameEngine = new CliGameEngine();
    }

    /**
     * {@inheritDoc}
     */
    public function run(GameAbstract $game = null): void
    {
        $player = new Player();
        $this->cliStream->line('Welcome to the Brain Games!');

        if ($game !== null && strlen($game->getDescription()) > 0) {
            $this->cliStream->line($game->getDescription());
        }

        $player->setName($this->cliStream->prompt('May I have your name?'));
        $this->cliStream->line("Hello, %s!", $player->getName());

        if ($game !== null) {
            $this->gameEngine->play($game, $player);
        }
    }
}
