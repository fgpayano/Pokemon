<?php

namespace App;

use App\Contracts\Evolution;

class Pokemon
{
    private $name;
    private $hp = 100;
    private $evolution = null;

    public function __construct($name, array $attacks)
    {
        $this->name = $name;
        $this->attacks = $attacks;
    }

    public function setHp($hp)
    {
        $this->hp = $hp;
    }

    public function chooseAttack()
    {
        $attack = array_rand($this->attacks, 1);

        return $this->attacks[$attack];
    }

    public function getHp()
    {
        if ($this->dead())
        {
            return 0;
        }

        return $this->hp;
    }

    public function setEvolution(Evolution $evolution = null)
    {
        $this->evolution = $evolution;
    }

    public function getName()
    {
        return $this->name;
    }

    public function dead()
    {
        return $this->hp < 1;
    }

    public function takeDamage(Pokemon $attacker)
    {
        $power = $attacker->chooseAttack()->getPower();

        if ($this->evolution)
        {
            $power = $this->evolution->powerUp($power);
        }

        $this->setHp($this->getHp() - $power);

        show("{$attacker->getName()} uso {$attacker->chooseAttack()->getName()}, {$this->getName()} tiene {$this->getHp()}/100 puntos de vida");
    }

    public function attack(Pokemon $opponent)
    {
        $opponent->takeDamage($this);

        if ($opponent->dead())
        {
            show("{$opponent->getName()} ha muerto! (x_x)");

            die();
        }
    }
}