<?php

namespace BrainGames\Model;

/**
 * Class Task
 *
 * @package BrainGames\Model
 */
class Task
{
    /**
     * @var string
     */
    private $question;
    /**
     * @var string
     */
    private $answer;

    /**
     * Task constructor.
     *
     * @param string $question
     * @param string $answer
     */
    public function __construct(string $question, string $answer)
    {
        $this->setQuestion($question);
        $this->setAnswer($answer);
    }

    /**
     * @return string
     */
    public function getQuestion(): string
    {
        return $this->question;
    }

    /**
     * @param string $question
     *
     * @return Task
     */
    public function setQuestion(string $question): Task
    {
        $this->question = $question;
        return $this;
    }

    /**
     * @return string
     */
    public function getAnswer(): string
    {
        return $this->answer;
    }

    /**
     * @param string $answer
     *
     * @return Task
     */
    public function setAnswer(string $answer): Task
    {
        $this->answer = $answer;
        return $this;
    }
}
