<?php

namespace BrainGames;

use BrainGames\Model\Player;

/**
 * Interface GameEngineInterface
 *
 * @package BrainGames
 */
interface GameEngineInterface
{
    /**
     * @param GameInterface $game
     * @param Player $player
     *
     * @param int $maxTasksCount
     *
     * @return mixed
     */
    public function play(GameInterface $game, Player $player, int $maxTasksCount = 3);
}
