<?php

namespace App\Evolutions;

use App\Contracts\Evolution;

class MissingEvolution implements Evolution
{
    public function powerUp($attack)
    {
        return $attack;
    }
}