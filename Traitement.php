<?php
require 'Autoloader.php';
Autoloader::register();

$cont = new Serviceetudiant();
$etudiant = new  Loger("nsjndn", "sjd", "MbacEEkL", "ndjnd@gmail.com", "1994-02-10", "769854125","1","1");
$cont->add($etudiant);
var_dump($etudiant);
