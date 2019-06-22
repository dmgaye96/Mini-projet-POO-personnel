<?php
ini_set("display_errors", 1);

class Boursier extends Etudiant
{
    private $id_type;

    public function __construct($matricule = "", $nom = "", $prenom = "", $email = "", $datenaissance = "", $tel = 0, $id_type=0)
    {
        parent::__construct($matricule, $nom, $prenom, $email, $datenaissance, $tel);

        $this->id_type = $id_type;
    }
  
    

    /**
     * Get the value of id_type
     */ 
    public function getId_type()
    {
        return $this->id_type;
    }

    /**
     * Set the value of id_type
     *
     * @return  self
     */ 
    public function setId_type($id_type)
    {
        $this->id_type = $id_type;

        return $this;
    }
}