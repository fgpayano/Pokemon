<?php

namespace App\Evolutions;

use App\Contracts\Evolution;

class MegaEvolution implements Evolution
{
    public function powerUp($attack)
    {
        $attack->setPower($attack->getPower() * 15);

        return $attack;
    }
}