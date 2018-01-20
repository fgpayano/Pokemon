<?php

namespace App;

use App\Contracts\Evolution;

use App\Evolutions\MissingEvolution;

class Pokemon
{
    private $name = "";
    private $hp = 100;
    private $evolution = null;
    private $attacks = array();

    public function __construct($name, array $attacks)
    {
        $this->name = $name;
        $this->attacks = $attacks;
        $this->evolution = new MissingEvolution();
    }

    public function setHp($hp)
    {
        $this->hp = avoidNegative($hp, 0);
    }

    public function chooseAttack()
    {
        $attack = array_rand($this->attacks, 1);

        return $this->attacks[$attack];
    }

    public function getHp()
    {
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

    private function makeAttackFromEvolution(Attack $attack)
    {
        return $this->evolution->powerUp($attack);
    }

    public function takeDamage(Pokemon $attacker)
    {
        $attack = $attacker->chooseAttack();

        $attack = $this->makeAttackFromEvolution($attack);

        $this->setHp($this->getHp() - $attack->getPower());

        show("{$attacker->getName()} uso {$attack->getName()}, {$this->getName()} tiene {$this->getHp()}/100 puntos de vida");
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