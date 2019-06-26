<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
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
       
        <div class="col s12"">
            <br> 


            <table id="example" class="table table-striped table-bordered" style="width:100%">
         
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
                    require 'Autoloader.php';
                    Autoloader::register();
                    $typee = new Serviceetudiant();

                    foreach ($typee->findBoursier() as $libe) {

                        ?>

                        <tr>

                        <td> <?php echo $libe->matricul?></td>
                <td> <?php echo $libe->prenom?></td>
                <td><?php echo $libe->nom?></td>
                <td><?php echo $libe->datenaissance?></td>
                <td><?php echo $libe->email?></td>
                <td><?php echo $libe->tel?></td>
                <td><?php echo $libe->libelle?></td>
                <td><?php echo $libe->montant?></td>
                        </tr>


                    <?php } ?>
                </tbody>

            </table>


            </div>
            <div class="col s12">  
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
} );
  
  </script>
  
   </div>
</body>

</html>