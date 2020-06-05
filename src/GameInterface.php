<?php

namespace BrainGames;

use BrainGames\Model\Task;

/**
 * Interface GameInterface
 *
 * @package BrainGames
 */
interface GameInterface
{
    /**
     * @return string
     */
    public function getDescription(): string;

    /**
     * @param int $count
     *
     * @return Task[]
     */
    public function getTasks(int $count): array;
}
