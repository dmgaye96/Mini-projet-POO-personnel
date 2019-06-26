<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Título del documento</title>
  <link rel="stylesheet" href="css/materialize.min.css">
  <script src="jquery-3.4.1.min.js"></script>
  <link rel="stylesheet" href="css/estilos.css">
</head>
<?php
require 'Autoloader.php';
Autoloader::register();  ?>

<body>
  <div>
    <div class="col s12">
      <nav class="cyan">
        <div class="nav-wrapper">
          <a href="#!" class="brand-logo">EDMG</a>
          <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          <ul class="right toggle-on-med-and-down">
            <li><a href="index.php">Ajouter Etudiant</a></li>
            <li><a href="Listesdesetudiant.php"> Liste des Etudiant </a></li>
            <li><a href="ajouterbatiment.php" ">Ajouter un Logement</a></li>
                            <li><a href=" Rechercheboursier.php">Recherche de Boursier</a></li>
            <li><a href="Listeboursier.php">Liste des Boursiers</a></li>
          </ul>
        </div>
      </nav>
      <ul class="sidenav" id="mobile-demo">
        <li><a href="index.php">Ajouter Etudiant</a></li>
        <li><a href="Listesdesetudiant.php"> Liste des Etudiant </a></li>
        <li><a href="ajouterbatiment.php" ">Ajouter un Logement</a></li>
                    <li><a href=" Rechercheboursier.php">Recherche de Boursier</a></li>
        <li><a href="Listeboursier.php">Liste des Boursiers</a></li>
      </ul>
    </div>
  </div><br>
  <div class="row">
    <div class="col s3"></div>
    <div class="col s6">
      <br> <br>
      <h5> ajouter Batiment ou Chambre </h5> <br> <br>
      <p id="batiment">
        <label>
          <input type="radio" name="bat">
          <span>Ajouter un Batiment</span>
        </label>
      </p>
      <p id="chambre">
        <label>
          <input type="radio" name="bat" id="chambre">
          <span>Ajouter une Chambre</span>
        </label>
      </p>
      <form method="post">
        <div class="input-field col s4" hidden id="nobatt">
          <input type="text" name="nombat" class="validate">
          <label for="primer_nombre">Nom du Batiment</label>
        </div>
        <div class="row" id="ch1" hidden>
          <div class="input-field col s4">
            <input type="text" name="nomch" class="validate">
            <label for="primer_nombre">Nom du Chambre</label>
          </div>
        </div>
        <div class="row">
          <label for="primer_nombre" id="bat1" hidden>
            <span>
              La Chambre vas se Trouver dans le Batiment ?
            </span>
          </label>
        </div>
        <label id="nobat2" hidden>Nom du Batiment </label>
        <br>
        <div class="row">
          <div class="col s4" id="selectbat" hidden>
            <select class="browser-default" name="type">
              <?php

              $typee = new Serviceetudiant();

              foreach ($typee->findAll("batiment") as $libe) {
                echo " <option value=$libe->id_bat> $libe->nom_bat</option> ";
              }
              ?>

            </select>

          </div>
        </div>

        <button class="btn waves-effect waves-light blue" type="submit" name="action">Ajouter
          <i class="material-icons right">send</i>
        </button>

    </div>
    </form>
  </div>


  <?php
  /* require 'Autoloader
    $nom_bat = $_POST['nombat'];
    $cont = new Serviceetudiant();
    if (!empty($_POST['nombat']) && empty($_POST['type'])&& empty(.php';
Autoloader::register(); */

  if (isset($_POST['action'])) {
    $id_batiment = $_POST['type'];
    $nomchambre = $_POST['nomch'];
    $nom_bat = $_POST['nombat'];
    $cont = new Serviceetudiant();
    if (!empty($_POST['nombat']) && empty($_POST['nomch'])) {

      $etudiant = new Batiment($nom_bat);
      $cont->addbatiment($etudiant);
    } elseif (empty($_POST['nombat']) && !empty($_POST['nomch']) && !empty($_POST['type'])) {
      $etudiant = new  Chambre($id_batiment, $nomchambre);
      $cont->addchambre($etudiant);
      if ($cont) {
        echo "<h6>" . "Chambre ajouter avec success" . " </h6>";
      } else  echo "<h6>" . "Echec de l'ajout de la chambre" . " </h6>";
    }
  }

  ?>

  </div>

  <script src="jquery.min.js"></script>
  <script src="js/materialize.min.js"></script>

  <script>
    $(function() {

      $("#batiment").click(function() {
        $("#nomcham").hide();
        $("#nobatt").show();
        $("#button").show();
        $("#ch1").hide();
        $("#bat1").hide();
        $("#selectbat").hide();
        $("#nobat2").hide();
      });
      $("#chambre").click(function() {
        $("#nobatt").hide();
        $("#nomcham").show();
        $("#button").show();
        $("#ch1").show();
        $("#bat1").show();
        $("#selectbat").show();
        $("#nobat2").show();

      });



    });
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.sidenav');
      var instances = M.Sidenav.init(elems, options);
    });

    // Or with jQuery

    $(document).ready(function() {
      $('.sidenav').sidenav();
    });
  </script>
</body>

</html>