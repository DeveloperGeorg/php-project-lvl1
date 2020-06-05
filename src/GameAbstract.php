<?php

namespace BrainGames;

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
}
