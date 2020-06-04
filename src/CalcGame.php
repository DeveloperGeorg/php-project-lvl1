<?php

namespace BrainGames;

use BrainGames\Model\Player;
use cli\Streams;

/**
 * Class CalcGame
 *
 * @package BrainGames
 */
class CalcGame implements GamePlayableInterface, DescriptionHavingInterface
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
    public function getDescription(): string
    {
        return 'What is the result of the expression?';
    }

    /**
     * {@inheritDoc}
     */
    public function play(Player $player)
    {
        // TODO: Implement play() method.
    }
}
