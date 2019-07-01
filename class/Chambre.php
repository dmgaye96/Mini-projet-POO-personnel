<?php
class Chambre
{
    
    private $id_batiment;
    private $nomchambre;
    public function __construct( $id_batiment, $nomchambre)
    {
        
        $this->id_batiment = $id_batiment;
        $this->nomchambre = $nomchambre;
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
