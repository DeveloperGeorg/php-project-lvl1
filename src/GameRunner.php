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
     * @param GamePlayableInterface|null $gamePlayable
     *
     * @return void
     */
    public function run(GamePlayableInterface $gamePlayable = null): void;
}
