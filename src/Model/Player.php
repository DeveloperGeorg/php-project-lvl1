<?php

namespace BrainGames\Model;

/**
 * Class Player
 */
class Player
{
    /**
     * @var string|null
     */
    private $name = null;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return Player
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }
}
