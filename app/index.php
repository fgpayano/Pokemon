<?php

include '../vendor/autoload.php';

use App\MegaEvolution;
use App\LinealEvolution;
use App\Pokemon;
use App\Attack;

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

$raichu = new Pokemon("Raichu", $electricPokemonAttacks);

$squirtle = new Pokemon("Squirtle", $waterPokemonAttacks);

$raichu->attack($squirtle);

$squirtle->attack($raichu);

$raichu->attack($squirtle);

$raichu->setEvolution(new MegaEvolution);

$squirtle->attack($raichu);

$raichu->attack($squirtle);

$squirtle->attack($raichu);

$raichu->attack($squirtle);

$squirtle->attack($raichu);