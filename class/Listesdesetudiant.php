<?php
session_start();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="../css/materialize.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .pagination .page-item.active .page-link {
        background-color: #03a9f4;
    }

    div.dataTables_wrapper div.dataTables_paginate ul.pagination .page-item.active .page-link: focus {
        couleur de fond: #03a9f4;
    }

    .pagination .page-item.active .page-link: survol {
        couleur de fond: #03a9f4;
    }
</style>

<body>

    <div class="container-fluid">
        <div>
            <div class="container-fluid">


                <nav class="light-blue">
                    <div class="nav-wrapper">
                        <a href="#!" class="brand-logo">DMG</a>
                        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                        <ul class="right toggle-on-med-and-down">
                            <li><a class="collection-item" href="../index.php">Ajouter Etudiant</a></li>
                            <li><a class="collection-item" href="Listesdesetudiant.php"> Liste des Etudiants </a></li>
                            <li><a href="ajouterbatiment.php" ">Ajouter un Logement</a></li>                            
                        </ul>
                    </div>
                </nav>

                <ul class="sidenav" id="mobile-demo">
                    <li><a class="white-text" href="../index.php">Ajouter Etudiant</a></li>
                    <li><a class="collection-item" href="Listesdesetudiant.php"> Liste des Etudiants </a></li>
                    <li><a href="ajouterbatiment.php" ">Ajouter un Logement</a></li>
                </ul>





                <div class="nav dmg">

                    <marquee behavior="alternate">
                        <h5 class="light-blue-text"> ICI VOUS POUVEZ AVOIR LA LISTE DE TOUS LES ETUDIANTS  RECHERCHER,SUPPRIMER...</h5>
                    </marquee>



                    <div class="row">
                        <div class="col s2"></div>
                        <div class="light-blue col s8" class="nav-content">

                            <ul class="tabs tabs-transparent">
                                <li class="tab"><a id="b1" class="active" href="#test1"> Tous les Etudiants</a></li>
                                <li class="tab"><a id="b2" class="active" href="#test2">Liste des Boursiers</a></li>
                                <li class="tab"><a id="b3" class="active" href="#test3">Liste des Boursiers Logés</a></li>
                                <li class="tab"><a id="b4" class="active" href="#test4">Liste des Non Boursiers</a></li>
                            </ul>
                        </div>
                    </div>


                    <ul class="sidenav" id="mobile-demo">
                        <li><a class="collection-item" href="../index.php">Ajouter Etudiant</a></li>
                        <li><a class="collection-item" href="Listesdesetudiant.php"> Liste des Etudiants </a></li>
                        <li><a href="ajouterbatiment.php" ">Ajouter un Logement</a></li>                            
                            <li><a class=" collection-item" href="Rechercheboursier.php" ">Rechercher un Etudiant</a></li>
                            <li><a class=" collection-item" href="Rechercheboursier.php">Recherche de Boursiers</a></li>
                        <li><a class="collection-item" href="Listeboursier.php">Liste des Boursiers</a></li>
                    </ul>





                </div>




            </div>
        </div>
        <div class="row">
            <br> <br> <br>
        </div>
        <div class="row">
            <div id="l1">
                <h5 class="light-blue-text">La liste de tous les etudiants</h5>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr class="light-blue white-text">
                            <th>Matricule </th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Date de Naissance</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Statut</th>
                            <th>Supprimer</th>
                           

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require 'Autoloader.php';


                        Autoloader::register();
                        $typee = new Serviceetudiant();

                        foreach ($typee->findAll("etudiant") as $libe) {

                              $a="STATUT";
                            ?>

                            <tr>
                                <td> <?php echo $libe->matricul ?></td>
                                <td> <?php echo $libe->prenom ?></td>
                                <td><?php echo $libe->nom ?></td>
                                <td><?php echo $libe->datenaissance ?></td>
                                <td><?php echo $libe->email ?></td>
                                <td><?php echo $libe->tel ?></td>
                                <td>
                                    <?php echo " <a href='Listeboursimodifierer.php?id=" .$libe->id_etudiant ."&matricul=".$libe->matricul ." &prenom=" .$libe->prenom. "&nom=" .$libe->nom .
                                     "&date=" . $libe->datenaissance . "&email=" .  $libe->email. "&tel=" .$libe->tel ."'>"
                                        . "<button class='btn btn light-blue'>" . $a . "</button>" . "</a> </td>"; ?>

                                </td>
                                <td>
                                    <?php echo " <a href='suppression.php?id=" .$libe->id_etudiant ."&matricul=".$libe->matricul ." &prenom=" .$libe->prenom. "&nom=" .$libe->nom .
                                     "&date=" . $libe->datenaissance . "&email=" .  $libe->email. "&tel=" .$libe->tel ."'>"
                                        . "<button class='btn btn red'>Supprimer </button>" . "</a> </td>"; ?>

                                </td>
                           

                            </tr>
                        <?php  } ?>
                    </tbody>

                </table>
            </div>
        </div>


        <div id="l2">
            <h5 class="light-blue-text"> Liste des Boursiers</h5>


            <table id="example1" class="table table-striped table-bordered" style="width:100%">

                <thead>

                    <tr class="light-blue white-text">
                        <th>Marticule</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Date de Naissance</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Libellé</th>
                        <th>Montant</th>
                        <th>Modifier</th>
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
                            <td>
                                    <?php echo " <a href='modifier.php?id=".$libe->id_etudiant."&matricule=".$libe->matricul ." &prenom=" .$libe->prenom. "&nom=" .$libe->nom .
                                     "&date=" . $libe->datenaissance . "&email=" .  $libe->email. "&tel=" .$libe->tel ."&type=".$libe->id_type."'>"
                                        . "<button class='btn btn '>Modifier</button>" . "</a> </td>"; ?>

                                </td>
                        </tr>


                    <?php } ?>
                </tbody>

            </table>

        </div>



        <div id="l3">

            <h5 class="light-blue-text">Liste des Boursiers Logés</h5>


            <table id="example2" class="table table-striped table-bordered" style="width:100%">

                <thead>

                    <tr class="light-blue white-text">
                        <th>Marticule</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Date de Naissance</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Libellé</th>
                        <th>Montant</th>
                        <th>Chambre</th>
                        <th>Batiment</th>
                        <th>Modifier</th>
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
                            <td><?php echo $libe->nom_bat ?></td>
                            <td>
                                    <?php echo " <a href='modifier.php?id=".$libe->id_etudiant."&matricule=".$libe->matricul ." &prenom=" .$libe->prenom. "&nom=" .$libe->nom .
                                     "&date=" . $libe->datenaissance . "&email=" .  $libe->email. 
                                     "&tel=" .$libe->tel."&type=".$libe->id_type."&chambre=".$libe->id_chambre."'>"
                                        . "<button class='btn btn '>Modifier</button>" . "</a> </td>"; ?>

                                </td>
                        </tr>


                    <?php } ?>
                </tbody>

            </table>



        </div>


        <div id="l4">
            <h5 class="light-blue-text"> Liste des Non Boursiers</h5>
            <table id="example3" class="table table-striped table-bordered" style="width:100%">

                <thead>

                    <tr class="light-blue white-text">
                        <th>Marticule</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Date de Naissance</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Adresse</th>
                        <th>Modifier</th>
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
                            <td>
                                    <?php echo " <a href='modifier.php?id=".$libe->id_etudiant."&matricule=".$libe->matricul ." &prenom=" .$libe->prenom. "&nom=" .$libe->nom .
                                     "&date=" . $libe->datenaissance . "&email=" .  $libe->email. "&tel=" .$libe->tel ."&adresse=".$libe->adresse."'>"
                                        . "<button class='btn btn '>Modifier</button>" . "</a> </td>"; ?>

                                </td>

                        </tr>


                    <?php } ?>
                </tbody>

            </table>

        </div>




        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    dom: "<'row'<'col-sm-4'f><'col-sm-offset-2 col-sm-6'B>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-xs-12 col-sm-7 col-sm-offset-5 text-right'p>>",
                    "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [-1]
                    }],
                    "oLanguage": {
                        "oPaginate": {
                            "sFirst": "Premier",
                            "sLast": "Dérnier",
                            "sNext": "Suivant",
                            "sPrevious": "Précedent",
                        },
                        "sSearch": "Recherche:",
                        "sEmptyTable": "Aucune donnée disponible",
                        "sInfo": "affichage de _START_ à _END_ sur _TOTAL_ éléments",
                        "sInfoEmpty": "Aucune donnée disponible",
                        "sInfoFiltered": "(Recherché sur _MAX_ éléments au total)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "sLengthMenu": "Afficher par _MENU_ éléments",
                        "loadingRecords": "Chargement...",
                        "processing": "procéssus...",
                        "sZeroRecords": "Aucun résultat trouvé",
                    },
                    "iDisplayLength": 10,
                    "lengthChange": false,
                    "info": false,
                    buttons: [{
                        extend: "copyHtml5",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        },
                        className: "btn-sm",
                        text: "Copier"
                    }, {
                        extend: "csvHtml5",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        },
                        className: "btn-sm"
                    }, {
                        extend: "excelHtml5",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        },
                        className: "btn-sm"
                    }, {
                        extend: "pdfHtml5",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        },
                        className: "btn-sm"
                    }, {
                        extend: "print",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        },
                        className: "btn-sm",
                        text: "Imprimer"
                    }],
                    responsive: false
                });

            });
        </script>


        <script>
            $(document).ready(function() {
                $('#example1').DataTable({
                    dom: "<'row'<'col-sm-4'f><'col-sm-offset-2 col-sm-6'B>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-xs-12 col-sm-7 col-sm-offset-5 text-right'p>>",
                    "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [-1]
                    }],
                    "oLanguage": {
                        "oPaginate": {
                            "sFirst": "Premier",
                            "sLast": "Dérnier",
                            "sNext": "Suivant",
                            "sPrevious": "Précedent",
                        },
                        "sSearch": "Recherche:",
                        "sEmptyTable": "Aucune donnée disponible",
                        "sInfo": "affichage de _START_ à _END_ sur _TOTAL_ éléments",
                        "sInfoEmpty": "Aucune donnée disponible",
                        "sInfoFiltered": "(Recherché sur _MAX_ éléments au total)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "sLengthMenu": "Afficher par _MENU_ éléments",
                        "loadingRecords": "Chargement...",
                        "processing": "procéssus...",
                        "sZeroRecords": "Aucun résultat trouvé",
                    },
                    "iDisplayLength": 10,
                    "lengthChange": false,
                    "info": false,
                    buttons: [{
                        extend: "copyHtml5",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        },
                        className: "btn-sm",
                        text: "Copier"
                    }, {
                        extend: "csvHtml5",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        },
                        className: "btn-sm"
                    }, {
                        extend: "excelHtml5",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        },
                        className: "btn-sm"
                    }, {
                        extend: "pdfHtml5",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        },
                        className: "btn-sm"
                    }, {
                        extend: "print",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        },
                        className: "btn-sm",
                        text: "Imprimer"
                    }],
                    responsive: false
                });

            });
        </script>

        <script>
            $(document).ready(function() {
                $('#example2').DataTable({
                    dom: "<'row'<'col-sm-4'f><'col-sm-offset-2 col-sm-6'B>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-xs-12 col-sm-7 col-sm-offset-5 text-right'p>>",
                    "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [-1]
                    }],
                    "oLanguage": {
                        "oPaginate": {
                            "sFirst": "Premier",
                            "sLast": "Dérnier",
                            "sNext": "Suivant",
                            "sPrevious": "Précedent",
                        },
                        "sSearch": "Recherche:",
                        "sEmptyTable": "Aucune donnée disponible",
                        "sInfo": "affichage de _START_ à _END_ sur _TOTAL_ éléments",
                        "sInfoEmpty": "Aucune donnée disponible",
                        "sInfoFiltered": "(Recherché sur _MAX_ éléments au total)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "sLengthMenu": "Afficher par _MENU_ éléments",
                        "loadingRecords": "Chargement...",
                        "processing": "procéssus...",
                        "sZeroRecords": "Aucun résultat trouvé",
                    },
                    "iDisplayLength": 10,
                    "lengthChange": false,
                    "info": false,
                    buttons: [{
                        extend: "copyHtml5",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        },
                        className: "btn-sm",
                        text: "Copier"
                    }, {
                        extend: "csvHtml5",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        },
                        className: "btn-sm"
                    }, {
                        extend: "excelHtml5",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        },
                        className: "btn-sm"
                    }, {
                        extend: "pdfHtml5",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        },
                        className: "btn-sm"
                    }, {
                        extend: "print",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        },
                        className: "btn-sm",
                        text: "Imprimer"
                    }],
                    responsive: false
                });

            });
        </script>

        <script>
            $(document).ready(function() {
                $('#example3').DataTable({
                    dom: "<'row'<'col-sm-4'f><'col-sm-offset-2 col-sm-6'B>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-xs-12 col-sm-7 col-sm-offset-5 text-right'p>>",
                    "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [-1]
                    }],
                    "oLanguage": {
                        "oPaginate": {
                            "sFirst": "Premier",
                            "sLast": "Dérnier",
                            "sNext": "Suivant",
                            "sPrevious": "Précedent",
                        },
                        "sSearch": "Recherche:",
                        "sEmptyTable": "Aucune donnée disponible",
                        "sInfo": "affichage de _START_ à _END_ sur _TOTAL_ éléments",
                        "sInfoEmpty": "Aucune donnée disponible",
                        "sInfoFiltered": "(Recherché sur _MAX_ éléments au total)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "sLengthMenu": "Afficher par _MENU_ éléments",
                        "loadingRecords": "Chargement...",
                        "processing": "procéssus...",
                        "sZeroRecords": "Aucun résultat trouvé",
                    },
                    "iDisplayLength": 10,
                    "lengthChange": false,
                    "info": false,
                    buttons: [{
                        extend: "copyHtml5",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        },
                        className: "btn-sm",
                        text: "Copier"
                    }, {
                        extend: "csvHtml5",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        },
                        className: "btn-sm"
                    }, {
                        extend: "excelHtml5",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        },
                        className: "btn-sm"
                    }, {
                        extend: "pdfHtml5",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        },
                        className: "btn-sm"
                    }, {
                        extend: "print",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        },
                        className: "btn-sm",
                        text: "Imprimer"
                    }],
                    responsive: false
                });

            });
        </script>
        <script>
            $(function() {
                $("#b1").click(function() {
                    $("#l1").show();
                    $("#l2").hide();
                    $("#l3").hide();
                    $("#l4").hide();
                });
                $("#b2").click(function() {
                    $("#l1").hide();
                    $("#l2").show();
                    $("#l3").hide();
                    $("#l4").hide();
                });
                $("#b3").click(function() {
                    $("#l1").hide();
                    $("#l2").hide();
                    $("#l3").show();
                    $("#l4").hide();
                });
                $("#b4").click(function() {
                    $("#l1").hide();
                    $("#l2").hide();
                    $("#l3").hide();
                    $("#l4").show();
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
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>