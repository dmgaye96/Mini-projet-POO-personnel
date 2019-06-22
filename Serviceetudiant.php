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
        $req->bindValue(':matricul', $etudiant->getMatricule(), PDO::PARAM_STR);
        $req->bindValue(':nom', $etudiant->getNom(), PDO::PARAM_STR);
        $req->bindValue(':prenom', $etudiant->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(':email', $etudiant->getEmail(), PDO::PARAM_STR);
        $req->bindValue(':datenaissance', $etudiant->getDatenaissance());
        $req->bindValue(':tel', $etudiant->getTel(), PDO::PARAM_INT);
        $insert = $req->execute();
        if ($insert) {
            echo "Etudiant ajouter avec succes !";
        } else {
            echo "Etudiant non ajouter";
        }

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

    /*   public function find($query, $params = [])
    {
        try {
            $requet = $this->db->prepare($query);
            $requet->execute($params);
            return $requet->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
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
    public function findAll()
    { }
    public function findBoursier($table, $colonne, $valeur)
    {
        try {
            $requet = $this->db->prepare("SELECT * FROM boursier WHERE $colonne='$valeur'");
            $requet->execute();
            return $requet->fetch(PDO::FETCH_OBJ);
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
}
