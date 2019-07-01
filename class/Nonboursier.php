<?php
/* ini_set("display_errors", 1); */

class Nonboursier extends Etudiant
{

    private $adresse;

    public function __construct( $matricule = "", $nom = "", $prenom = "", $email = "", $datenaissance = "", $tel ="",$adresse="")
    {
        parent::__construct($matricule, $nom, $prenom, $email, $datenaissance, $tel);
        $this->adresse = $adresse;
    }
   
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }
    public function getAdresse()
    {
        return $this->adresse;
    }
}

/* $nonboursier =new Nonboursier($adresse);
$cont=new Serviceetudiant($db);
$cont->add($etudiant); */