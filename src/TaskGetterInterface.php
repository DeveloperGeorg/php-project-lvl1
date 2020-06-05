<?php

namespace BrainGames;

use BrainGames\Model\Task;

/**
 * Interface TaskGetterInterface
 *
 * @package BrainGames
 */
interface TaskGetterInterface
{
    /**
     * @param int $count
     *
     * @return Task[]
     */
    public function getTasks(int $count): array;
}
