<?php

namespace BrainGames\Games;

use BrainGames\DescriptionHavingInterface;
use BrainGames\Model\Task;
use BrainGames\TaskGetterInterface;

/**
 * Interface GameInterface
 *
 * @package BrainGames
 */
abstract class GameAbstract implements DescriptionHavingInterface, TaskGetterInterface
{
    /**
     * {@inheritDoc}
     */
    abstract public function getDescription(): string;

    /**
     * {@inheritDoc}
     */
    abstract public function getTasks(int $count): array;

    /**
     * @param int $count
     * @param $function Callback function
     *
     * @return array
     */
    protected function collectTasks(int $count, $function)
    {
        $tasks = [];
        while (count($tasks) < $count) {
            $task = $function();
            if ($task instanceof Task) {
                $tasks[] = $task;
            }
        }

        return $tasks;
    }
}
