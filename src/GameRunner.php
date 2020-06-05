<?php

namespace BrainGames;

/**
 * Interface GameRunner
 *
 * @package BrainGames
 */
interface GameRunner
{
    /**
     * @param GameInterface|null $game
     *
     * @return void
     */
    public function run(GameInterface $game = null): void;
}
