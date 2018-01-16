<?php

namespace App;

use App\Contracts\Evolution;

abstract class Pokemon
{
    private $name;
    private $hp = 100;
    protected $power = 10;
    private $evolution = null;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function setHp($hp)
    {
        $this->hp = $hp;
    }

    public function getPower()
    {
        if ($this->evolution)
        {
            return $this->evolution->powerUp($this->power);
        }

        return $this->power;
    }

    public function setEvolution(Evolution $evolution = null)
    {
        $this->evolution = $evolution;
    }

    public function getHp()
    {
        return $this->hp;
    }

    public function getName()
    {
        return $this->name;
    }

    public function dead()
    {
        return $this->getHp() < 1;
    }

    abstract public function attack (Pokemon $opponent);
}