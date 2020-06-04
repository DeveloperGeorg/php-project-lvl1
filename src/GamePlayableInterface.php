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
     */
    public function play(Player $player);
}
