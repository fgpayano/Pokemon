<?php

namespace App;

use App\Contracts\Evolution;

use App\Evolutions\MissingEvolution;

class Pokemon
{
	private $hp = 100;
	private $name = "";
	private $attacks = [];
	private $evolution = null;

	const MIN_HP = 0;
	const MAX_RESULTS = 1;

    public function __construct($name, array $attacks)
    {
        $this->name = $name;
        $this->attacks = $attacks;
        $this->evolution = new MissingEvolution();
    }

    public function setHp($hp)
    {
        $this->hp = $hp;
    }

    public function chooseAttack()
    {
        $attack = array_rand($this->attacks, static::MAX_RESULTS);

        return $this->attacks[$attack];
    }

    public function getHp()
    {
        return max($this->hp, static::MIN_HP);
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
        return $this->hp <= static::MIN_HP;
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

		Log::info("{$attacker->getName()} uso {$attacker->chooseAttack()->getName()}, {$this->getName()} tiene {$this->getHp()}/100 puntos de vida"); 
    }

    public function attack(Pokemon $opponent)
    {
        $opponent->takeDamage($this);

        if ($opponent->dead())
        {
			Log::info("{$opponent->getName()} ha muerto! (x_x)");

            die();
        }
    }
}