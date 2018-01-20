<?php

namespace App;

class Attack
{
    private $name;
    private $power;
    private $message;

    public function __construct($name, $power)
    {
        $this->name = $name;
        $this->power = $power;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setPower($power)
    {
        return $power;
    }

    public function getPower()
    {
        return $this->power;
    }
}