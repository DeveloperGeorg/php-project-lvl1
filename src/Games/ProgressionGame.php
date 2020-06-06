<?php

namespace BrainGames\Games;

use BrainGames\Model\Task;

/**
 * Class ProgressionGame
 *
 * @package BrainGames
 */
class ProgressionGame extends GameAbstract
{
    /**
     * @var int
     */
    private $progressionLength = 10;

    /**
     * {@inheritDoc}
     */
    public function getDescription(): string
    {
        return 'What number is missing in the progression?';
    }

    /**
     * {@inheritDoc}
     */
    public function getTasks(int $count): array
    {
        return $this->collectTasks($count, function () {
            $startNumber = rand(1, 999);
            $progressionDifference = rand(1, 100);
            $progression = $this->generateProgression(
                $startNumber,
                $progressionDifference,
                $this->getProgressionLength()
            );
            $hiddenPosition = rand(1, count($progression)) - 1;
            $answer = $progression[$hiddenPosition];
            $progression[$hiddenPosition] = '..';
            return new Task(
                implode(' ', $progression),
                $answer
            );
        });
    }

    /**
     * @param int $start
     * @param int $progressionDifference
     * @param int $length
     *
     * @return array
     */
    private function generateProgression(int $start, int $progressionDifference, int $length): array
    {
        $progression = [];
        $number = $start;
        $progression[] = $number;
        while (count($progression) < $length) {
            $number += $progressionDifference;
            $progression[] = $number;
        }
        return $progression;
    }

    /**
     * @return int
     */
    public function getProgressionLength(): int
    {
        return $this->progressionLength;
    }

    /**
     * @param int $progressionLength
     *
     * @return ProgressionGame
     */
    public function setProgressionLength(int $progressionLength): ProgressionGame
    {
        $this->progressionLength = $progressionLength;
        return $this;
    }
}
