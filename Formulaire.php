<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!--  CDN jQuery -->
    <script src="jquery-3.4.1.min.js"></script>

    <title>Document</title>
</head>

<body>
    <?php require 'Autoloader.php';
    Autoloader::register();
    ?>
    <div class="container-fluid">

        <div class="row">
            <div class="col s12">


                <nav>
                    <div class="nav-wrapper">
                        <a href="#!" class="brand-logo">EDMG</a>
                        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                        <ul class="right toggle-on-med-and-down">
                            <li><a href="#">Ajouter Etudiant</a></li>
                            <li><a href="badges.html">Rechercher un Etudiant</a></li>
                            <li><a href="badges.html">Liste des Etudiant</a></li>
                            <li><a href="collapsible.html">Recherche de Boursier</a></li>
                            <li><a href="mobile.html">Liste des Boursiers</a></li>
                        </ul>
                    </div>
                </nav>

                <ul class="sidenav" id="mobile-demo">
                    <li><a href="#">Ajouter Etudiant</a></li>
                    <li><a href="badges.html">Rechercher un Etudiant</a></li>
                    <li><a href="badges.html">Liste des Etudiant</a></li>
                    <li><a href="collapsible.html">Recherche de Boursier</a></li>
                    <li><a href="mobile.html">Liste des Boursiers</a></li>
                </ul>


            </div>
        </div>

        <div class="row">
            <div class="col s4"> </div>

            <div class="col s4">
                <h4>Ajouter un Etudiant</h4>
                <div class="row">
                    <form class="col s12" action="#" method="post">

                        <div class="row">
                            <div class="input-field col s6">
                                <i class="material-icons prefix">
                                    perm_identity</i>
                                <input name="prenom" type="text" class="validate">
                                <label for="Prenom">Prenom</label>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">
                                    perm_identity</i>
                                <input name="nom" type="text" class="validate">
                                <label for="Nom">Nom</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <i class="material-icons prefix">email</i>
                                <input type="email" class="validate" name="email">
                                <label for="Email">Email</label>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">fingerprint</i>
                                <input name="matricule" type="text" class="validate">
                                <label for="Matricule">Matricule</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s6">
                                <i class="material-icons prefix">date_range</i>
                                <input name="date" type="date" class="datepicker">
                                <label for="icon_prefix">Date de Naissance</label>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">phone</i>
                                <input id="icon_telephone" type="tel" name="tel" class="validate">
                                <label for="icon_telephone">Telephone</label>
                            </div>
                        </div>

                        <p id="non">
                            <label>
                                <input class="with-gap" name="group1" id="non" type="radio" />
                                <span>Non Boursier</span>
                            </label>
                        </p>
                        <p id="boursier">
                            <label>
                                <input class="with-gap" name="group1" type="radio" id="boursier" />
                                <span>Boursier</span>
                            </label>
                        </p>
                        <p id="loge">
                            <label>
                                <input class="with-gap" name="group1" id="loge" type="radio" />
                                <span>Logé</span>
                            </label>
                        </p>


                        <div class="input-field col s6" id="Adresse" hidden>
                            <i class="material-icons prefix">fingerprint</i>
                            <input name="adresse" type="text" class="validate">
                            <label for="adresse">Adresse</label>
                        </div>



                        <div id="typedebourse" hidden>
                            <label>Type de Bourse</label>
                            <select class="browser-default" name="type">

                                <?php
                                $typee = new Serviceetudiant();
                                
                                foreach ($typee->findAll("type") as $libe) {
                                    echo " <option value=$libe->id_type> $libe->libelle</option> ";
                                }
                                ?>

                            </select>
                        </div>


                        <div id="chambre" hidden>
                            <label>Chambre</label>
                            <select class="browser-default" name="chambre">

                                <?php
                                $ch = new Serviceetudiant();
                                foreach ($ch->findAll("chambre") as $val) {
                                    echo " <option value=$val->id_chambre> $val->nomchambre</option> ";
                                }

                                ?>


                            </select>
                        </div>
                        <br>
                        <label>
                            <input type="submit" value="AJOUTER" class="waves-effect waves-light btn" name="ajouter">
                        </label>

                    </form>
                </div>


            </div>
        </div>








        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.datepicker');
                var instances = M.Datepicker.init(elems, options);
            });

            // Or with jQuery

            $(document).ready(function() {
                $('.datepicker').datepicker();
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
        <!--   <script>
            $(document).ready(function() {
                $('input#input_text, textarea#textarea2').characterCounter();
            });
        </script> -->

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


        <footer class="page-footer">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Sonatel Academy</h5>
                        <p class="grey-text text-lighten-4">Coding For Better life</p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">Links</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    © 2019 EDMG
                    <a class="grey-text text-lighten-4 right" href="#!"> Voir plus</a>
                </div>
            </div>
        </footer>



    </div>
    <!--     <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems, options);
        });

        $(document).ready(function() {
            $('select').formSelect();
        });
    </script> -->
    <?php
    /*  include "Etudiant.php";
    include "Serviceetudiant.php"; */


    if (isset($_POST['ajouter'])) {
        $matricule = $_POST['matricule'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $datenaissance = $_POST['date'];
        $tel = $_POST['tel'];
        $adresse = $_POST['adresse'];
        $id_type = $_POST['type'];
        $id_chambre = $_POST['chambre'];
       
        $cont = new Serviceetudiant();
        if ( !empty($adresse) ) {
           
            $etudiant = new  Nonboursier($matricule, $nom, $prenom, $email, $datenaissance, $tel, $adresse);
          
            $cont->add($etudiant);
        }  elseif (!empty($id_type)&& empty($id_chambre)) {
            $etudiant = new Boursier($matricule, $nom, $prenom, $email, $datenaissance, $tel, $id_type);
            $cont = new Serviceetudiant();
            $cont->add($etudiant);
        } 
            else
            $etudiant = new Loger($matricule, $nom, $prenom, $email, $datenaissance, $tel, $id_type, $id_chambre);
            $cont = new Serviceetudiant();
            $cont->add($etudiant);
   
    }


    ?>

</body>

</html>