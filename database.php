<?php
namespace miniprojetpoo;
class database{

     private $db_name;
     private $db_user;
     private $db_pass;
     private $db_host;
     private $pdo;


    public function __construct( $db_name,$db_user='root',$db_pass='dmg',$db_host='localhost')
    {
      $this->db_name=$db_name;
      $this->db_host=$db_host;
      $this->db_user=$db_user;
      $this->db_pass=$db_pass;
    
    }
    private function getPDO(){
        $pdo = new PDO('mysql:host=localhost; dbname=universite; charset=utf8','root','dmg',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $this->pdo=$pdo;
            return $pdo;
    }


    public function query($statment){

$this->getPDO();

    }
}