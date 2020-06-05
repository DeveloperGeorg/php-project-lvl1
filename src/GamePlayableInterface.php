<?php

namespace BrainGames;

use BrainGames\Model\Player;

/**
 * Interface GamePlayableInterface
 *
 * @package BrainGames
 */
interface GamePlayableInterface
{
    /**
     * @param Player $player
     *
     * @return mixed
     * @todo think about refactoring: maybe it`s better to you tasks and player or GameInterface as parameters
     *  and this is will be PlayableExecutor
     *
     */
    public function play(Player $player);
}
