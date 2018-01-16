<?php

namespace App;

use App\Contracts\Evolution;

class MegaEvolution implements Evolution
{
    public function powerUp($power)
    {
        return $power * 15;
    }
}