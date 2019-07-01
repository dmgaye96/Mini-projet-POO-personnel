<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Título del documento</title>
  <link rel="stylesheet" href="../css/materialize.min.css">
  <script src="../js/jquery-3.4.1.min.js"></script>
  <link rel="stylesheet" href="css/estilos.css">
</head>
<?php
  require 'Autoloader.php';
  Autoloader::register();  ?>

<body>
  <div>
  <div class="col s12">
<nav class="light-blue">
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo">DMG</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right toggle-on-med-and-down">
            <li><a href="../index.php">Ajouter Etudiant</a></li>
            <li><a href="Listesdesetudiant.php"> Liste des Etudiants </a></li>
            <li><a href="ajouterbatiment.php" ">Ajouter un Logement</a></li>
        </ul>
    </div>
</nav>

<ul class="sidenav" id="mobile-demo">
    <li><a href="../index.php">Ajouter Etudiant</a></li>
    <li><a href="Listesdesetudiant.php"> Liste des Etudiants </a></li>
    <li><a href="ajouterbatiment.php" ">Ajouter un Logement</a></li>
</ul>
</div>
  </div><br>
  <div class="row">
    <div class="col s3"></div>
    <div class="col s6">
      <br> <br>
      <h5 class="light-blue-text"> ajouter un Batiment ou une Chambre </h5> <br> <br>
      <h6 class="light-blue-text">Tous les champs <font color=red> (*)</font> sont requis </h6>
      <p id="batiment">
        <label>
          <input type="radio" name="bat">
          <span class="light-blue-text">Ajouter un Batiment</span>
        </label>
      </p>
      <p id="chambre">
        <label>
          <input type="radio" name="bat" id="chambre">
          <span class="light-blue-text">Ajouter une Chambre</span>
        </label>
      </p>
      <form method="post">
        <div class="input-field col s4" hidden id="nobatt">
          <input type="text" name="nombat" class="validate">
          <label class="light-blue-text">Nom du Batiment <font color=red> *</font></label>
        </div>
        <div class="row" id="ch1" hidden>
          <div class="input-field col s4" class="light-blue-text">
            <input type="text" name="nomch" class="light-blue-validate">
            <label for="primer_nombre" class="light-blue-text">Nom du Chambre <font color=red> *</font></label>
          </div>
        </div>
        <div class="row">
          <label for="primer_nombre" id="bat1" hidden>
            <span class="light-blue-text">
              La Chambre va se trouver dans quel batiment ?
            </span>
          </label>
        </div>
        <label id="nobat2" class="light-blue-text" hidden>Nom du Batiment <font color=red> *</font> </label>
        <br>
        <div class="row">
          <div class="col s4" id="selectbat" hidden>
            <select class="browser-default" name="type">
              <?php

              $typee = new Serviceetudiant();

              foreach ($typee->findAll("batiment") as $libe) {
                echo " <option class=\"light-blue-text\" value=$libe->id_bat> $libe->nom_bat</option> ";
              }
              ?>

            </select>

          </div>
        </div>

        <button class="btn waves-effect waves light-blue" type="submit" name="action">Ajouter
          <i class="material-icons right"> </i>
        </button>


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
            if ($cont) { ?>
              <div class="row">
                <h6 class=" light-green-text text-darken-2">Batiment ajouté avec succès</h6>
              </div>

            <?php  }
        } elseif (empty($_POST['nombat']) && !empty($_POST['nomch']) && !empty($_POST['type'])) {
          $etudiant = new  Chambre($id_batiment, $nomchambre);
          $cont->addchambre($etudiant);
          if ($cont) { ?>
              <div class="row">
                <h6 class=" light-green-text text-darken-2">Chambre ajoutée avec succès</h6>
              </div>


            <?php }
        } else if (empty($_POST['nombat']) && empty($_POST['nomch']) && !empty($_POST['type'])) {

          ?>
            <div class="row">
              <h6 class="red-text text-darken-2"> veuiller remplire les champs requis svp *</h6>
            </div>

          <?php
        }
      }

      ?>

      </form>



    </div>
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