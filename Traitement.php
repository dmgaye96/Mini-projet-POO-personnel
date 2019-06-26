<?php
require 'Autoloader.php';
Autoloader::register();

// ajouter un batima
/* $cont = new Serviceetudiant();
$etudiant = new  Batiment("BAtima DMG");
$cont-> addbatiment($etudiant);
var_dump($etudiant); */

//ajouter u  Chambre 
/* $cont = new Serviceetudiant(); */
/* $etudiant = new  Chambre(14,'chambredfgsdxxeee');
$cont-> addchambre($etudiant);
var_dump($etudiant);
 */

$objet1 = new Serviceetudiant();
foreach ($objet1->findloge() as $libe) {
    var_dump($libe);
}
