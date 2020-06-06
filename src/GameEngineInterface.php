<?php

namespace BrainGames;

use BrainGames\Games\GameAbstract;
use BrainGames\Model\Player;

/**
 * Interface GameEngineInterface
 *
 * @package BrainGames
 */
interface GameEngineInterface
{
    /**
     * @param GameAbstract $game
     * @param Player $player
     *
     * @param int $maxTasksCount
     *
     * @return mixed
     */
    public function play(GameAbstract $game, Player $player, int $maxTasksCount = 3);
}
