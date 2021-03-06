<?php

include './vendor/autoload.php';

use App\Log;
use App\Attack;
use App\Pokemon;
use App\HtmlLogger;
use App\FileLogger;
use App\Evolutions\MegaEvolution;
use App\Evolutions\LinealEvolution;

$electricPokemonAttacks = [
    new Attack("Bola Voltio", 40),
    new Attack("Onda Trueno", 16),
    new Attack("Chispazo", 35),
    new Attack("Rayo", 65),
];

$waterPokemonAttacks = [
    new Attack("Fuerza", 80),
    new Attack("Puño Dinámico", 90),
    new Attack("Cascada", 40),
    new Attack("Buceo", 30),
];

Log::setLogger(new HtmlLogger);

$raichu = new Pokemon("Raichu", $electricPokemonAttacks);

$squirtle = new Pokemon("Squirtle", $waterPokemonAttacks);

$raichu->attack($squirtle);

$squirtle->attack($raichu);

$raichu->attack($squirtle);

$raichu->setEvolution(new MegaEvolution);

$squirtle->attack($raichu);

$raichu->attack($squirtle);

$squirtle->setEvolution(new LinealEvolution);

$squirtle->attack($raichu);

$raichu->attack($squirtle);

$squirtle->attack($raichu);