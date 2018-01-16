<?php

namespace App;

class Water extends Pokemon
{
    protected $power = 50;

    public function attack(Pokemon $opponent)
    {
        $opponent->setHp($opponent->getHp() - $this->getPower() / 2);

        if ($this->dead())
        {
            show("{$this->getName()} ha muerto!");

            die();
        }

        show("{$this->getName()} lanza burbuja de agua, {$opponent->getName()} tiene {$opponent->getHp()} puntos de vida");

    }
}