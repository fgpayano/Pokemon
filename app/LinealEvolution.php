<?php

namespace App;

use App\Contracts\Evolution;

class LinealEvolution implements Evolution
{
    public function powerUp($power)
    {
        return $power * 10;
    }
}