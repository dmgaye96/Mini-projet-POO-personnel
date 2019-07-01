<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
 
<div class="container-fluid">
<div>
<div class="col s12">
<nav class="light-blue">
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo">DMG</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right toggle-on-med-and-down">
            <li><a href="../index.php">Ajouter Etudiant</a></li>
            <li><a href="Listesdesetudiant.php"> Liste des Etudiant </a></li>
            <li><a href="ajouterbatiment.php" ">Ajouter un Logement</a></li>
            <li><a href=" Rechercheboursier.php">Recherche de Boursier</a> </li> <li><a href="Listeboursier.php">Liste des Boursiers</a></li>
        </ul>
    </div>
</nav>

<ul class="sidenav" id="mobile-demo">
    <li><a href="../index.php">Ajouter Etudiant</a></li>
    <li><a href="Listesdesetudiant.php"> Liste des Etudiant </a></li>
    <li><a href="ajouterbatiment.php" ">Ajouter un Logement</a></li>
            <li><a href="Rechercheboursier.php">Recherche de Boursier</a> </li> <li><a href="Listeboursier.php">Liste des Boursiers</a></li>
</ul>
</div>
        </div>
        <div class="row"> 
            <div class="col s1"></div>
        <div class="col s10"> 
        <h4> liste des loge </h4> 
<table class="responsive-table">
<thead>   
        <th>Marticul</th>
        <th></th>
        <th>Prenom</th>
        <th></th>
        <th>Nom</th>
        <th></th>
        <th>Date de Naissance</th>
        <th></th>
        <th>Email</th>
        <th></th>
        <th>Telephone</th>
        </thead>
<?php
   require 'Autoloader.php';
  Autoloader::register();
$typee = new Serviceetudiant();

foreach ($typee->findAll("etudiant") as $libe) {
    echo "
     <tr>
     <td>$libe->matricul<td>
     <td>$libe->prenom<td>
     <td>$libe->nom<td>
     <td>$libe->datenaissance<td>
     <td>$libe->email<td>
     <td>$libe->tel<td>
   ";

?>
  </tr>
<?php } ?>

</table>
</div>
</div>
<footer class="light-blue">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Sonatel Academy</h5>
                        <p class="grey-text text-lighten-4">Coding For Better life</p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">Link</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                        </ul>
                        <a class="grey-text text-lighten-4 right" href="#!"> Voir plus</a>
                    </div>
                </div>
                <div class="footer-copyright">
                    <div align=center>
                        <h6 class="white-text"> © 2019 DMG </h6>

                    </div>
                </div>
            </div>

        </footer>

</div>

</body>
</html>