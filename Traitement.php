<?php
require 'Autoloader.php';
Autoloader::register();

$cont = new Serviceetudiant();
$etudiant = new  Loger("nsjnNcdn", "DIOUFFX", "Morre", "xndjxcd@gmail.com", "1994-02-10", "76974125","1","1");
$cont->add($etudiant);
var_dump($etudiant); 

/* 

$objet1= new Serviceetudiant();
$var=$objet1->findAll("etudiant");
var_dump($var);  */