<?php
/* ini_set("display_errors", 1); */

class Loger extends Boursier
{

    private $id_chambre;

    public function __construct($matricule = "", $nom = "", $prenom = "", $email = "", $datenaissance = "", $tel ="", $id_type ="", $id_chambre ="")
    {
        parent::__construct($matricule, $nom, $prenom, $email, $datenaissance, $tel, $id_type);
        $this->id_chambre = $id_chambre;
    }



    /**
     * Get the value of id_chambre
     */
    public function getId_chambre()
    {
        return $this->id_chambre;
    }

    /**
     * Set the value of id_chambre
     *
     * @return  self
     */
    public function setId_chambre($id_chambre)
    {
        $this->id_chambre = $id_chambre;

        return $this;
    }
}
