<?php
/* ini_set("display_errors",1); */
abstract class Etudiant
{

  private $matricule;
  private $nom;
  private $prenom;
  private $email;
  private $datenaissance;
  private $tel;

  public function __construct($matricule="", $nom="", $prenom="", $email="", $datenaissance="", $tel="")
  {
    $this->matricule = $matricule;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->email = $email;
    $this->datenaissance = $datenaissance;
    $this->tel = $tel;
  }

   
  public function setMatricule($matricule)
  {
    $this->matricule = $matricule;
  }
  public function getMatricule(){
    return $this->matricule;

  }
  public function setNom($nom){
    $this->nom=$nom;
  }
  public function getNom(){
    return $this->nom;
  }
  public function setPrenom($prenom){
    $this->prenom=$prenom;

  }
  public function getPrenom()
  {
    return $this->prenom;
  }
  public function setEmail($email){
    $this->email=$email;
  
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function setDatenaissance($datenaissance){
    $this->datenaissance=$datenaissance;
  }
  public function getDatenaissance(){
    return $this->datenaissance;
  }
  public function setTel($tel){
    $this->tel=$tel;
  }
  public function getTel(){
    return $this->tel;
  }
  

}

