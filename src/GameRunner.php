<?php

namespace BrainGames;

use BrainGames\Games\GameAbstract;

/**
 * Interface GameRunner
 *
 * @package BrainGames
 */
interface GameRunner
{
    /**
     * @param GameAbstract|null $game
     *
     * @return void
     */
    public function run(GameAbstract $game = null): void;
}
