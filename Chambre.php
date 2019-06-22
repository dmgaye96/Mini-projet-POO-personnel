<?php
class Chambre
{
    private $id_chambre;
    private $id_batiment;
    private $nomchambre;
    public function __construct($id_chambre, $id_batiment, $nomchambre)
    {
        $this->id_chambre = $id_chambre;
        $this->id_batiment = $id_batiment;
        $this->nomchambre = $nomchambre;
    }

    public function getId_chambre()
    {
        return $this->id_chambre;
    }

    public function setId_chambre($id_chambre)
    {
        $this->id_chambre = $id_chambre;

        return $this;
    }



    public function getId_batiment()
    {
        return $this->id_batiment;
    }


    public function setId_batiment($id_batiment)
    {
        $this->id_batiment = $id_batiment;

        return $this;
    }


    public function getNomchambre()
    {
        return $this->nomchambre;
    }

    public function setNomchambre($nomchambre)
    {
        $this->nomchambre = $nomchambre;

        return $this;
    }
}
