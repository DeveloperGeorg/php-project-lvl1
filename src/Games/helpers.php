<?php

namespace BrainGames\Games\Helpers;

use BrainGames\Model\Task;

define('ANSWER_YES', 'yes');
define('ANSWER_NO', 'no');

/**
 * @param int $count
 * @param $function
 *
 * @return Task[]
 */
function collectTasks(int $count, $function)
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
