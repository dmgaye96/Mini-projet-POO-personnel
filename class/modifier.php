<?php
session_start();
require 'Autoloader.php';
Autoloader::register();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=universite', 'root', 'dmg');
$typee = new Serviceetudiant();

$nom = ($_GET['nom']);
$prenom = ($_GET['prenom']);
$email = ($_GET['email']);
$matricule = ($_GET['matricule']);
$datenaissance = ($_GET['date']);
$tel = ($_GET['tel']);
/* $id_type = htmlspecialchars($_GET['type']);
$adresse = htmlspecialchars($_GET['adresse']); 
$id_chambre = htmlspecialchars($_GET['chambre']);*/

if (isset($_POST['annuler'])) {
    header("Location:Listesdesetudiant.php");
}

if (isset($_GET['id'])) {

    $req = $bdd->prepare("SELECT * FROM etudiant WHERE id=?");
    $req->execute(array($_GET['id']));
    $user = $req->fetch();

    if (isset($_POST['modifier'])) {


        $reqmail = $bdd->prepare("SELECT * FROM etudiant WHERE email=?");
        $reqmail->execute(array($_POST['email']));
        $mailexist = $reqmail->rowCount();
        if ($mailexist != 0 && $_POST['email'] != $_GET['email']) {
            $mgs = "<font color=red>ce mail existe deja dans la base<font>";
        }
        $remat = $bdd->prepare("SELECT * FROM etudiant WHERE matricul=?");
        $remat->execute(array($_POST['matricule']));
        $matexist = $remat->rowCount();

        if ($matexist !=0 && $_POST['matricule'] != $_GET['matricule']  ) {

            $mgs = "<font color=red>ce matricule existe dejà dans la base<font>";
        }
        $reqtel = $bdd->prepare("SELECT * FROM etudiant WHERE tel=?");
        $reqtel->execute(array($tel));
        $telexiste = $reqtel->rowCount();
        if ( $telexiste !=0 && $_POST['tel'] != $_GET['tel'] ) 
        {
            $mgs = "<font color=red>ce  numero de telephone existe dejà dans la base<font>";
        }

         else {
            $req = $bdd->prepare(" UPDATE etudiant SET nom=? , prenom = ?, email =?, datenaissance =?, tel =? WHERE etudiant.id_etudiant =?;");
            $req->execute(array($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['date'], $_POST['tel'], $_GET['id']));

            $mgs = "<font color=green>modification effectuer avec succès<font><a href=\"Listesdesetudiant.php\"> <label>
            <input type=\"submit\" value=\"Liste des etudiants\" class=\"waves-effect waves light-blue\">
        </label></a>";
        }
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../css/icon.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="../js/jquery-3.4.1.min.js"></script>

        <title>Document</title>
    </head>

    <body>

        <div class="container-fluid">


            <div class="row">
                <div class="col s4"> </div>

                <div class="col s4">
                    <h4 class="light-blue-text">Modifier un Etudiant</h4>
                    <h6 class="light-blue-text">Tout les champs <font color=red> (*)</font> sont requis</h6>
                    <div class="row">
                        <form class="col s12" action="#" method="post">

                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">
                                        perm_identity</i>
                                    <input name="prenom" type="text" required minlength="2" maxlength="25" size="25" for="Prenom" class="validate" value="<?php

                                                                                                                                                            echo $prenom; ?>">
                                    <label class="light-blue-text">Prenom<font color=red> *</font></label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">
                                        perm_identity</i>
                                    <input name="nom" type="text" required minlength="1" maxlength="20" size="20" class="validate" value="<?php if (isset($nom)) {
                                                                                                                                                echo $nom;
                                                                                                                                            } ?>">
                                    <label for="Nom" class="light-blue-text">Nom<font color=red> *</font></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">email</i>
                                    <input type="email" class="validate" required minlength="2" maxlength="30" size="30" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" value="<?php if (isset($email)) {
                                                                                                                                                                                                    echo $email;
                                                                                                                                                                                                } ?>">
                                    <label class="light-blue-text" for="Email">Email<font color=red> *</font></label>
                                </div>



                                <div class="input-field col s6">
                                    <i class="material-icons prefix">fingerprint</i>
                                    <input name="matricule" type="text" required minlength="4" maxlength="4" size="4" class="validate" value="<?php if (isset($matricule)) {
                                                                                                                                                    echo $matricule;
                                                                                                                                                } ?>">
                                    <label class="light-blue-text" for="Matricule">Matricule<font color=red> *</font></label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">date_range</i>
                                    <input name="date" type="date" max="2019-01-01" min="1980-01-01" required class="datepicker" value="<?php if (isset($datenaissance)) {
                                                                                                                                            echo $datenaissance;
                                                                                                                                        } ?>">
                                    <label class="light-blue-text" for="icon_prefix">Date de Naissance<font color=red> *</font></label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">phone</i>
                                    <input id="icon_telephone" type="tel" name="tel" class="validate" required value="<?php if (isset($tel)) {
                                                                                                                            echo $tel;
                                                                                                                        } ?>">
                                    <label class="light-blue-text" for="icon_telephone">Telephone<font color=red> *</font></label>
                                </div>
                            </div>

                            <label class="light-blue-text">
                                <input type="submit" value="Modifier" class='btn btn green' name="modifier">
                            </label>
                            &#160 &#160 &#160 &#160 <input type="submit" class='btn btn red' name="annuler" value="Annuler ">
                            <br> <br>
                        </form>
                        <br> <br>
                        <?php
                        if (isset($mgs)) {
                            echo $mgs;
                        } ?>

                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var elems = document.querySelectorAll('.datepicker');
                    var instances = M.Datepicker.init(elems, options);
                });

                $(document).ready(function() {
                    $('.datepicker').datepicker();
                });

                document.addEventListener('DOMContentLoaded', function() {
                    var elems = document.querySelectorAll('.sidenav');
                    var instances = M.Sidenav.init(elems, options);
                });



                $(document).ready(function() {
                    $('.sidenav').sidenav();
                });
            </script>


            <!--   gestion des formulaires DMG -->
            <script>
                $(function() {

                    $("#non").click(function() {
                        $("#Adresse").show();
                        $("#typedebourse").hide();
                        $("#batiment").hide();
                        $("#chambre").hide();

                    });
                    $("#boursier").click(function() {
                        $("#Adresse").hide();
                        $("#typedebourse").show();
                        $("#batiment").hide();
                        $("#chambre").hide();
                    });
                    $("#loge").click(function() {
                        $("#Adresse").hide();
                        $("#typedebourse").show();
                        $("#chambre").show();




                    });

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

<?php
} ?>