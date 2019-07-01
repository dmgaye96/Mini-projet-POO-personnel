<?php
ini_set("display_errors", 1);
class Serviceetudiant
{
    public $isconnect;
    protected $db;
    public function __construct($login = "root", $password = "dmg", $server = "localhost", $dbname = "universite")
    {
        $this->isconnect = true;
        try {
            $this->db = new PDO("mysql:host={$server};dbname={$dbname}", $login, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {

            throw new Exception($e->getMessage());
        }
    }
    public function disconnect()
    {
        $this->db = NULL;
        $this->isconnect = FALSE;
    }
    public function add(Etudiant $etudiant)
    {
        $req = $this->db->prepare('INSERT INTO etudiant ( matricul, nom, prenom, email, datenaissance, tel)
         VALUES (:matricul, :nom, :prenom, :email, :datenaissance, :tel )');
        $req->bindValue(':matricul', $etudiant->getMatricule());
        $req->bindValue(':nom', $etudiant->getNom());
        $req->bindValue(':prenom', $etudiant->getPrenom());
        $req->bindValue(':email', $etudiant->getEmail());
        $req->bindValue(':datenaissance', $etudiant->getDatenaissance());
        $req->bindValue(':tel', $etudiant->getTel());
        $req->execute();
        $req = $this->db->query("SELECT MAX(id_etudiant) as id_etudiant FROM etudiant ");

        while ($rows = $req->fetch()) {
            $id = $rows['id_etudiant'];
        }



        if (get_class($etudiant) == "Nonboursier") {
            $adresse = $etudiant->getAdresse();
            $req = $this->db->prepare('INSERT INTO noboursier (id_etudiant, adresse)
             VALUES (:id_etudiant, :adresse)');
            $req->bindValue(':id_etudiant', $id);
            $req->bindValue(':adresse', $adresse);
            $req->execute();
        } else if (get_class($etudiant) == "Boursier" || get_class($etudiant) == "Loger") {

            $type = $etudiant->getId_type();
            $req = $this->db->prepare('INSERT INTO boursier (id_etudiant, id_type) 
            VALUES (:id_etudiant,:id_type)');
            $req->bindValue(':id_etudiant', $id);
            $req->bindValue(':id_type', $type);
            $req->execute();

            if (get_class($etudiant) == "Loger") {

                $chambre = $etudiant->getId_chambre();
                $req = $this->db->prepare('INSERT INTO loger (id_etudiant, id_chambre)
                 VALUES (:id_etudiant,:id_chambre)');
                $req->bindValue(':id_etudiant', $id);
                $req->bindValue(':id_chambre', $chambre);
                $req->execute();
            }
        }
       
    }
/* 
  public function statu(Etudiant $etudiant){
      $req = $this->db->prepare("SELECT *id_etudiant  as id_etudiant FROM etudiant");
      $req->execute();
      var_dump($req);
     
          if (get_class($etudiant) == "Nonboursier") {
              echo "c est un non boursier";
          } elseif (get_class($etudiant) == "Boursier") {
              echo "c est un boursier";
          } elseif (get_class($etudiant) == "Loger") {
              echo "c est un non boursier";
          } else {
              echo "le type d etudiant n existe pas";
          }
      
  } */
    public function find($table, $colonne, $valeur)
    {
        try {
            $requet = $this->db->prepare("SELECT * FROM etudiant WHERE $colonne='$valeur'");
            $requet->execute();
            return $requet->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
    public function findAll($table)
    {
        
        try {
            $requet = $this->db->prepare("SELECT * FROM $table");
            $requet->execute();
            return $requet->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
     }
    public function findBoursier()
    {
        try {
            $requet = $this->db->prepare("SELECT etudiant.id_etudiant as id_etudiant,etudiant.matricul as matricul,etudiant.nom as nom,
            etudiant.prenom as prenom,etudiant.email as email,etudiant.datenaissance as datenaissance,etudiant.tel as tel,
            type.libelle as libelle,type.montant as montant,type.id_type as id_type FROM etudiant ,type,boursier
             WHERE etudiant.id_etudiant=boursier.id_etudiant 
             AND boursier.id_type=type.id_type");
            $requet->execute();
            return $requet->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
    public function findloge()
    {
        try {
            $req=$this->db->prepare(" SELECT DISTINCT etudiant.id_etudiant as id_etudiant,etudiant.matricul as matricul,etudiant.nom as nom,etudiant.prenom as prenom,etudiant.email as email,
            etudiant.datenaissance as datenaissance,etudiant.tel as tel,type.libelle as libelle,type.montant as montant,chambre.nomchambre as nomchambre,
            batiment.nom_bat as nom_bat,type.id_type as id_type,loger.id_chambre as id_chambre
             FROM etudiant,type,boursier,batiment,chambre,loger WHERE etudiant.id_etudiant=boursier.id_etudiant AND boursier.id_etudiant=loger.id_etudiant AND boursier.id_type=type.id_type AND loger.id_chambre=chambre.id_chambre AND chambre.id_bat=batiment.id_bat");
            $req->execute();
            return $req->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
            
        }

    } 
    public function findnoboursier()
    {
        try {
            $req=$this->db->prepare(" SELECT DISTINCT etudiant.id_etudiant as id_etudiant,etudiant.matricul as matricul,etudiant.nom as nom,etudiant.prenom as prenom,etudiant.email as email,
            etudiant.datenaissance as datenaissance,etudiant.tel as tel,noboursier.adresse as adresse
             FROM etudiant,noboursier WHERE etudiant.id_etudiant=noboursier.id_etudiant");
            $req->execute();
            return $req->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
            
        }

    }

    public function findAllBousier ($table, $colonne, $valeur)
    {
        try {
            $requet = $this->db->prepare("SELECT * FROM boursier WHERE $colonne='$valeur'");
            $requet->execute();
            return $requet->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
    public function addbatiment(Batiment $batiment)
    {
        try {
            $nom_bat=$batiment->getNombatiment();
            $requet= $this->db->prepare('INSERT INTO batiment (nom_bat) VALUES (:nom_bat)');
            $requet->bindValue(':nom_bat',$nom_bat);
            $requet->execute();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
       /*  if ($requet->execute()) {
            echo "Batima  ajouter avec succes !";
        } else {
            echo "Etudiant non ajouter";
        } */

    }
    public function addchambre(Chambre $chambre)
    {

try {
    $idbat=$chambre->getId_batiment();
    $nomcham=$chambre->getNomchambre();
    $requet=$this->db->prepare('INSERT INTO chambre (nomchambre, id_bat) 
    VALUES (:nomchambre, :id_bat)');
    $requet->bindValue(':nomchambre',$nomcham);
    $requet->bindValue(':id_bat',$idbat);
    $requet->execute();
    
} catch (PDOException $e)
 {
    throw new Exception($e->getMessage());
    
}
    }


public function statut($id){

    $reqmat =$this->db->prepare("SELECT * FROM  loger WHERE id_etudiant=?");
    $reqmat->execute(array($id));
    $idexist = $reqmat->rowCount();
    if ($idexist == 0) {

        $reqmat = $this->db->prepare("SELECT * FROM  boursier WHERE id_etudiant=?");
        $reqmat->execute(array($id));
        $idexist = $reqmat->rowCount();
        if ($idexist==0) {
            $reqmat =$this->db->prepare("SELECT * FROM noboursier WHERE id_etudiant=?");
        $reqmat->execute(array($id));
        $idexist = $reqmat->rowCount();
         if ($idexist==0) {
            $msg = " l etudiant n a pas de statut" ;
         }
         else $msg = "Non Boursier";
        }
        else $msg = "Boursier";
        


    }    else $msg="Boursier & Logé";
   
}

public function update(Etudiant $etudiant,$id)
{   $req = $this->db->query("SELECT * id_etudiant FROM etudiant ");
    $req = $this->db->prepare('UPDATE etudiant ( matricul, nom, prenom, email, datenaissance, tel)
     SET (:matricul, :nom, :prenom, :email, :datenaissance, :tel )WHERE id_etudiant='.$id);
    $req->bindValue(':matricul', $etudiant->getMatricule());
    $req->bindValue(':nom', $etudiant->getNom());
    $req->bindValue(':prenom', $etudiant->getPrenom());
    $req->bindValue(':email', $etudiant->getEmail());
    $req->bindValue(':datenaissance', $etudiant->getDatenaissance());
    $req->bindValue(':tel', $etudiant->getTel());
    $req->execute();
    $req = $this->db->query("SELECT MAX(id_etudiant) as id_etudiant FROM etudiant ");

    while ($rows = $req->fetch()) {
        $id = $rows['id_etudiant'];
    }



    if (get_class($etudiant) == "Nonboursier") {
        $adresse = $etudiant->getAdresse();
        $req = $this->db->prepare('UPDATE noboursier (id_etudiant, adresse)
         SET (:id_etudiant, :adresse) WHERE id_etudiant=:id_etudiant');
        $req->bindValue(':id_etudiant', $id);
        $req->bindValue(':adresse', $adresse);
        $req->execute();
    } else if (get_class($etudiant) == "Boursier" || get_class($etudiant) == "Loger") {

        $type = $etudiant->getId_type();
        $req = $this->db->prepare('UPDATE  boursier (id_etudiant, id_type) 
        SET (:id_etudiant,:id_type) WHERE id_etudiant=:id_etudiant');
        $req->bindValue(':id_etudiant', $id);
        $req->bindValue(':id_type', $type);
        $req->execute();

        if (get_class($etudiant) == "Loger") {

            $chambre = $etudiant->getId_chambre();
            $req = $this->db->prepare('UPDATE loger (id_etudiant, id_chambre)
             SET (:id_etudiant,:id_chambre) WHERE id_etudiant=:id_etudiant');
            $req->bindValue(':id_etudiant', $id);
            $req->bindValue(':id_chambre', $chambre);
            $req->execute();
        }
    }
   
}


   


}
