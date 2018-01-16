<?php

include '../vendor/autoload.php';

use App\Electric;
use App\Water;
use App\MegaEvolution;
use App\LinealEvolution;

$raichu = new Electric("Raichu");
$squirtle = new Water("Squirtle");

$raichu->attack($squirtle);

$squirtle->attack($raichu);

$raichu->attack($squirtle);

$raichu->setEvolution(new MegaEvolution);

$squirtle->attack($raichu);

$raichu->setEvolution(new LinealEvolution);

$raichu->attack($squirtle);

$squirtle->attack($raichu);

$raichu->attack($squirtle);

$squirtle->attack($raichu);