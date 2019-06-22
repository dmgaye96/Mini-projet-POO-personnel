<?php
ini_set("display_errors", 1);

class Typedebourse
{
    private $libelle;
    private $montant;


    public function __construct($libelle = "", $montant = "")
    {
        $this->libelle = $libelle;
        $this->montant = $montant;
    }
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }
    public function getLibelle(){
        return $this->libelle;
    }
    public function setMontant($montant)
    {
        $this->montant = $montant;
    }
    public function getMontant(){
        return $this->montant;
    }
}
