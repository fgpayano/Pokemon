<?php

namespace App;

class Electric extends Pokemon
{
    protected $power = 60;

    public function attack(Pokemon $opponent)
    {
        $opponent->setHp($opponent->getHp() - $this->getPower());

        if ($this->dead())
        {
            show("{$this->getName()} ha muerto!");

            die();
        }

        show("{$this->getName()} lanza rayo electrico, {$opponent->getName()} tiene {$opponent->getHp()} puntos de vida");


    }
}