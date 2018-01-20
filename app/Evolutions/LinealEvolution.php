<?php

namespace App\Evolutions;

use App\Contracts\Evolution;

class LinealEvolution implements Evolution
{
    public function powerUp($attack)
    {
        $attack->setPower($attack->getPower() * 10);

        return $attack;
    }
}