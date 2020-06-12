<?php

namespace BrainGames\Games\CliEngine;

use BrainGames\Model\Task;

use function cli\line;
use function cli\prompt;

/**
 * @param $getGameTasksFunction
 *
 * @return bool play game result: true - if win, false - if lose
 */
function play($getGameTasksFunction): bool
{
    /** @var Task[] $tasksAndAnswers */
    $tasksAndAnswers = $getGameTasksFunction();
    $rightAnswersCounter = 0;
    foreach ($tasksAndAnswers as $taskAndAnswer) {
        line("Question: {$taskAndAnswer->getQuestion()}");
        $answer = prompt('Your answer');
        if ($taskAndAnswer->getAnswer() == $answer) {
            line('Correct!');
            $rightAnswersCounter++;
        } else {
            line(
                "'{$answer}' is wrong answer ;(. Correct answer was '{$taskAndAnswer->getAnswer()}'."
            );
            break;
        }
    }

    return $rightAnswersCounter === count($tasksAndAnswers);
}
