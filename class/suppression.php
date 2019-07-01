<?php
session_start();

require 'Autoloader.php';
Autoloader::register();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=universite', 'root', 'dmg');
$typee = new Serviceetudiant();
$id = ($_GET['id']);
$matricul = ($_GET['matricul']);
$prenom = ($_GET['prenom']);
$nom = ($_GET['nom']);
$date = ($_GET['date']);
$email = ($_GET['email']);
$tel = ($_GET['tel']);


if (isset($id)) {
    if (isset($_POST['annuler'])) {
        header("Location:Listesdesetudiant.php");
    }
     
    if (isset($_POST['confirmer'])) {
        $reqmat = $bdd->prepare("DELETE FROM  etudiant WHERE etudiant.id_etudiant=?");
        $reqmat->execute(array($id));
        $eurreur = "<font color=green><h3>" . "L ' Etudiant " . ' ' . $prenom . ' ' . $nom . " a été supprimer avec succès " . "<h3></font><a href=\"Listesdesetudiant.php\"> <label>
        <input type=\"submit\" value=\"Listes des etudiants\" class=\"waves-effect waves light-blue\">
    </label></a>";
    } ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <!--   <div class="container-fluid"> -->



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

        <?php echo "<h3>Voulez vous supprimez l'etudiant" . ' ' . $prenom . '  ' . $nom . ' ' . " ?<h3>"; ?>
        <br>

        <div class="row">
            <div class="col s5"></div>
            <form action="" method="post">
                <input type="submit" class='btn btn green' name="confirmer" value="Confimer">
                <input type="submit" class='btn btn red' name="annuler" value="Annuler ">
            </form>
        </div>


      <?php 
      if(isset($eurreur)){
        echo $eurreur;
      }
      
      ?>



    </div>


    <br> <br> <br>
    <div class="col s12">
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
                    $typee = new Serviceetudiant(); </div>
            </div>

        </footer>
    </div>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    </div>

</body>

</html>

<?php
}
?>