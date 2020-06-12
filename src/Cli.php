<?php

namespace BrainGames\Cli;

use function BrainGames\Games\CliEngine\play;
use function cli\line;
use function cli\prompt;

/**
 * @param string $playGameFunction
 * @param string|null $description
 */
function run($playGameFunction = null, ?string $description = null): void
{
    line('Welcome to the Brain Games!');

    if ($description !== null && strlen($description) > 0) {
        line($description);
    }

    $playerName = prompt('May I have your name?');
    line("Hello, %s!", $playerName);

    if ($playGameFunction !== null) {
        $wasGameWined = play(
            $playGameFunction
        );
        if ($wasGameWined) {
            line("Congratulations, {$playerName}!");
        } else {
            line("Let's try again, {$playerName}!");
        }
    }
}
