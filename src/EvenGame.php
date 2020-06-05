<?php

namespace BrainGames;

use BrainGames\Model\Player;
use cli\Streams;
use Exception;

/**
 * Class EvenGame
 *
 * @package BrainGames
 */
class EvenGame implements GamePlayableInterface, DescriptionHavingInterface
{
    use GameFlowTrait;

    private const ANSWER_YES = 'yes';
    private const ANSWER_NO = 'no';

    /**
     * @var Streams
     */
    private $cliStream;

    /**
     * Cli constructor.
     *
     */
    public function __construct()
    {
        $this->cliStream = new Streams();
    }

    /**
     * {@inheritDoc}
     */
    public function play(Player $player)
    {
        $tasksAndAnswers = $this->getTasks($this->getMaxRightAnswersCount());
        $this->flow($tasksAndAnswers, $player);
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription(): string
    {
        return 'Answer "yes" if the number is even, otherwise answer "no"';
    }

    /**
     * @param int $count
     *
     * @return array
     */
    private function getTasks(int $count = 3)
    {
        $return = [];
        $taskCounter = 0;
        while ($taskCounter < $count) {
            try {
                $number = random_int(1, 999);
            } catch (Exception $e) {
                $number = rand(1, 999);
            }
            $return[] = [
                'question' => $number,
                'answer' => $number % 2 === 0 ? static::ANSWER_YES : static::ANSWER_NO
            ];
            $taskCounter++;
        }

        return $return;
    }
}
