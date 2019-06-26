<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
    <script src="jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <div class="container-fluid">
        <div>
            <div class="col s12">


                <nav class="cyan">
                    <div class="nav-wrapper">
                        <a href="#!" class="brand-logo">EDMG</a>
                        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                        <ul class="right toggle-on-med-and-down">
                            <li><a href="index.php">Ajouter Etudiant</a></li>
                            <li><a href="Listesdesetudiant.php"> Liste des Etudiant </a></li>
                            <li><a href="Rechercheboursier.php" ">Rechercher un Etudiant</a></li>
                            <li><a href=" Rechercheboursier.php">Recherche de Boursier</a></li>
                            <li><a href="Listeboursier.php">Liste des Boursiers</a></li>
                        </ul>
                    </div>
                </nav>

                <ul class="sidenav" id="mobile-demo">
                    <li><a href="index.php">Ajouter Etudiant</a></li>
                    <li><a href="Listesdesetudiant.php"> Liste des Etudiant </a></li>
                    <li><a href="Rechercheboursier.php" ">Rechercher un Etudiant</a></li>
                    <li><a href=" Rechercheboursier.php">Recherche de Boursier</a></li>
                    <li><a href="Listeboursier.php">Liste des Boursiers</a></li>
                </ul>


            </div>
        </div> <br> <br>
        <div class="row"> 
            <div class="col-lg-2"> </div>
            <div class="col s8"> 
        <label>
            
            <input type="submit" value="Liste des Etudiants"      id="b1"    class="waves-effect waves-light btn"> 
            <input type="submit" value="Liste des Boursier"       id="b2"    class="waves-effect waves-light btn">
            <input type="submit" value="Liste des Boursier Logé"  id="b3"    class="waves-effect waves-light btn"> 
            <input type="submit" value="Liste des Non Boursier"   id="b4"    class="waves-effect waves-light btn">
        </label>
        </div>
        </div>
        <div class="row">
            <br> <br> <br>
        </div>
        <div class="row" >  
        <div class="col s12" id="l1">
            <h1> Liste des Etudiants</h1>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
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
                    <?php
                    require 'Autoloader.php';
                    Autoloader::register();
                    $typee = new Serviceetudiant();

                    foreach ($typee->findAll("etudiant") as $libe) {
                        ?>

                        <tr>
                            <td> <?php echo $libe->matricul ?></td>
                            <td> <?php echo $libe->prenom ?></td>
                            <td><?php echo $libe->nom ?></td>
                            <td><?php echo $libe->datenaissance ?></td>
                            <td><?php echo $libe->email ?></td>
                            <td><?php echo $libe->tel ?></td>
                            <td> <a href="">STATUT </a> </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Matricul </th>
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Date de Naissance</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Statut</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        </div>


        <div class="col s12" id="l2">
            <h1> Liste des Boursiers</h1>


            <table id="example1" class="table table-striped table-bordered" style="width:100%">

                <thead>

                    <tr>
                        <th>Marticul</th>
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Date de Naissance</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Libelle</th>
                        <th>Montant</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $typee = new Serviceetudiant();

                    foreach ($typee->findBoursier() as $libe) {

                        ?>

                        <tr>

                            <td> <?php echo $libe->matricul ?></td>
                            <td> <?php echo $libe->prenom ?></td>
                            <td><?php echo $libe->nom ?></td>
                            <td><?php echo $libe->datenaissance ?></td>
                            <td><?php echo $libe->email ?></td>
                            <td><?php echo $libe->tel ?></td>
                            <td><?php echo $libe->libelle ?></td>
                            <td><?php echo $libe->montant ?></td>
                        </tr>


                    <?php } ?>
                </tbody>

            </table>

        </div>



        <div class="col s12" id="l3">

            <h1>Liste des Boursiers Logé</h1>
        

            <table id="example2" class="table table-striped table-bordered" style="width:100%">

<thead>

    <tr>
        <th>Marticul</th>
        <th>Prenom</th>
        <th>Nom</th>
        <th>Date de Naissance</th>
        <th>Email</th>
        <th>Telephone</th>
        <th>Libelle</th>
        <th>Montant</th>
        <th>Chambre</th>
        <th>Batiment</th>
    </tr>
</thead>
<tbody>
    <?php

    $typee = new Serviceetudiant();

    foreach ($typee->findloge() as $libe) {

        ?>

        <tr>

            <td> <?php echo $libe->matricul ?></td>
            <td> <?php echo $libe->prenom ?></td>
            <td><?php echo $libe->nom ?></td>
            <td><?php echo $libe->datenaissance ?></td>
            <td><?php echo $libe->email ?></td>
            <td><?php echo $libe->tel ?></td>
            <td><?php echo $libe->libelle ?></td>
            <td><?php echo $libe->montant ?></td>
            <td><?php echo $libe->nomchambre ?></td>
            <td><?php echo $libe->nom_bat?></td>
        </tr>


    <?php } ?>
</tbody>

</table>
           


        </div>


        <div class="col s12" id="l4">
            <h1> Liste des Non Boursiers</h1>
            <table id="example3" class="table table-striped table-bordered" style="width:100%">

                <thead>

                    <tr>
                        <th>Marticul</th>
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Date de Naissance</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Adresse</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $typee = new Serviceetudiant();

                    foreach ($typee->findnoboursier() as $libe) {

                        ?>

                        <tr>

                            <td> <?php echo $libe->matricul ?></td>
                            <td> <?php echo $libe->prenom ?></td>
                            <td><?php echo $libe->nom ?></td>
                            <td><?php echo $libe->datenaissance ?></td>
                            <td><?php echo $libe->email ?></td>
                            <td><?php echo $libe->tel ?></td>

                            <td><?php echo $libe->adresse ?></td>

                        </tr>


                    <?php } ?>
                </tbody>

            </table>

        </div>




        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>


        <script>
            $(document).ready(function() {
                $('#example1').DataTable();
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#example2').DataTable();
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#example3').DataTable();
            });
        </script>
        <script>
         $(function() {
            $("#b1").click (function() {
                $("#l1").show();
                $("#l2").hide();
                $("#l3").hide();
                $("#l4").hide();
            });
            $("#b2").click (function() {
                $("#l1").hide();
                $("#l2").show();
                $("#l3").hide();
                $("#l4").hide();
            });
            $("#b3").click (function() {
                $("#l1").hide();
                $("#l2").hide();
                $("#l3").show();
                $("#l4").hide();
            });
            $("#b4").click (function() {
                $("#l1").hide();
                $("#l2").hide();
                $("#l3").hide();
                $("#l4").show();
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
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>