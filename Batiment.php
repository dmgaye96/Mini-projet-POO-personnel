<?php
class Batiment
{
    private $nombatiment;

    public function __construct($nombatiment = "")
    {

        $this->nombatiment = $nombatiment;
    }

    public function getNombatiment()
    {
        return $this->nombatiment;
    }

    public function setNombatiment($nombatiment)
    {
        $this->nombatiment = $nombatiment;

        return $this;
    }
}
