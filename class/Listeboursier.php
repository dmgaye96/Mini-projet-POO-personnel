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

    $reqmat = $bdd->prepare("SELECT * FROM  loger WHERE id_etudiant=?");
    $reqmat->execute(array($id));
    $idexist = $reqmat->rowCount();
    if ($idexist == 0) {

        $reqmat = $bdd->prepare("SELECT * FROM  boursier WHERE id_etudiant=?");
        $reqmat->execute(array($id));
        $idexist = $reqmat->rowCount();
        if ($idexist == 0) {
            $reqmat = $bdd->prepare("SELECT * FROM noboursier WHERE id_etudiant=?");
            $reqmat->execute(array($id));
            $idexist = $reqmat->rowCount();
            if ($idexist == 0) {
                $msg = " l etudiant n a pas de statut";
            } else $msg = "Non Boursier";
        } else $msg = "Boursier";
    } else $msg = "Boursier & Logé";
}



?>

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
                    <li><a href="Listesdesetudiant.php"> Liste des Etudiant </a></li>
                    <li><a href="ajouterbatiment.php" ">Ajouter un Logement</a></li>
          
                </ul>
            </div>
        </nav>

        <ul class="sidenav" id="mobile-demo">
            <li><a href="../index.php">Ajouter Etudiant</a></li>
            <li><a href="Listesdesetudiant.php"> Liste des Etudiant </a></li>
            <li><a href="ajouterbatiment.php" ">Ajouter un Logement</a></li>
        </ul>
    </div>
    <div class="col s10">


        <table>
            <thead>
                <tr class="light-blue white-text">
                    <th>Matricul </th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Date de Naissance</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Statut</th>
                   
                </tr>
            </thead>
            <tbody>


                <tr>
                    <td> <?php echo $matricul; ?></td>
                    <td> <?php echo  $prenom; ?></td>
                    <td><?php echo $nom; ?></td>
                    <td><?php echo $date; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $tel; ?></td>
                    <td><?php echo $msg; ?></td>
                   
                </tr>

            </tbody>
        </table>

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
                </div>
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
?>