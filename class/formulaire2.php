<?php
  require 'Autoloader.php';
    Autoloader::register();
    if (isset($_POST['ajouter'])) {
        $cont = new Serviceetudiant();
        $matricule = htmlspecialchars($_POST['matricule']);
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $datenaissance = htmlspecialchars($_POST['date']);
        $tel = htmlspecialchars($_POST['tel']);
        $adresse = htmlspecialchars($_POST['adresse']);
        $id_type = htmlspecialchars($_POST['type']);
        $id_chambre = htmlspecialchars($_POST['chambre']);
        $con = new Serviceetudiant();
        foreach ($con->findAll("etudiant") as $libe) {
            $libe->email;
            $libe->matricul;
            $libe->tel;
           $a= Count( $libe->tel ===$tel);
            
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
               
                if ($libe->email==$email) {
                   
                    if ($matricule != $libe->matricul ) {
                      
                      
                        if (  $libe->tel !== $tel) {
                            if (!empty($adresse) && empty($id_type) && empty($id_chambre)) {
                                $etudiant = new  Nonboursier($matricule, $nom, $prenom, $email, $datenaissance, $tel, $adresse);
                                $cont->add($etudiant);
                                $eurreur = "<font color=green>" . "L ' Etudiant " . ' ' . $prenom . ' ' . $nom . " a ete ajouter avec success C est un non Boursier " . "</font> <a href=\"Listesdesetudiant.php\"> <label>
                              <input type=\"submit\" value=\"Listes des etudiants\" class=\"waves-effect waves light-blue\">
                          </label></a>";
                            } elseif (empty($adresse) && !empty($id_type) && empty($id_chambre)) {
                                $etudiant = new Boursier($matricule, $nom, $prenom, $email, $datenaissance, $tel, $id_type);
                                $cont->add($etudiant);
                                $eurreur = "<font color=green>" . "L ' Etudiant " . ' ' . $prenom . ' ' . $nom . " a ete ajouter avec success  C est un Boursier " . "</font><a href=\"Listesdesetudiant.php\"> <label>
                              <input type=\"submit\" value=\"Listes des etudiants\" class=\"waves-effect waves light-blue\">
                          </label></a>";
                            } elseif (empty($adresse) && !empty($id_type) && !empty($id_chambre)) {
                                $etudiant = new Loger($matricule, $nom, $prenom, $email, $datenaissance, $tel, $id_type, $id_chambre);
                                $cont->add($etudiant);
                                $eurreur = "<font color=green>" . "L ' Etudiant " . ' ' . $prenom . ' ' . $nom . " a ete ajouter avec success  C est un Boursier Loge" . "</font><a href=\"Listesdesetudiant.php\"> <label>
                              <input type=\"submit\" value=\"Listes des etudiants\" class=\"waves-effect waves light-blue\">
                          </label></a>";
                            } else {
                                $eurreur = "<font color=red>" . ' ' . $prenom . ' ' . $nom . "veuiller remplir les champs de requise svp Reassayer !" . "</font>";
                            }
                        } else {
                            $eurreur = "<font color=red>" . ' ' . $prenom . ' ' . $nom . " le numero de Telephone est  existe deja Reassayer !" . "</font>";
                        }
                    } else {
                        $eurreur = "<font color=red>" . '  ' . ' ' . $prenom . ' ' . $nom . "le maticule existe deja Reassayer !" . "</font>";
                    }
                } else {
                    $eurreur = "<font color=red>" . '  ' . ' ' . $prenom . ' ' . $nom . "  le mail existe deja Reassayer !" . "</font>";
                }
            } else {
                $eurreur = "<font color=red>" . '  ' . ' ' . $prenom . ' ' . $nom . "  le mail n' est pas valide !" . "</font>";
            }
        }
    }

    ?>
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

       <div class="container-fluid">

           <div>
               <div class="col s12">


                   <nav class="light-blue">
                       <div class="nav-wrapper">
                           <a href="#!" class="brand-logo">DMG</a>
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
           </div>

           <div class="row">
               <div class="col s4"> </div>

               <div class="col s4">
                   <h4 class="light-blue-text">Ajouter un Etudiant</h4>
                   <h6 class="light-blue-text">Tout les champs <font color=red> (*)</font> sont requisent </h6>
                   <div class="row">
                       <form class="col s12" action="index.php" method="post">

                           <div class="row">
                               <div class="input-field col s6">
                                   <i class="material-icons prefix">
                                       perm_identity</i>
                                   <input name="prenom" type="text" class="validate" value="<?php
                                                                                            if (isset($prenom)) {
                                                                                                echo $prenom;
                                                                                            }
                                                                                            ?>">
                                   <label class="light-blue-text" for="Prenom">Prenom<font color=red> *</font></label>
                               </div>
                               <div class="input-field col s6">
                                   <i class="material-icons prefix">
                                       perm_identity</i>
                                   <input name="nom" type="text" class="validate" value="<?php if (isset($nom)) {
                                                                                                echo $nom;
                                                                                            }
                                                                                            ?>">
                                   <label for="Nom" class="light-blue-text">Nom<font color=red> *</font></label>
                               </div>
                           </div>
                           <div class="row">
                               <div class="input-field col s6">
                                   <i class="material-icons prefix">email</i>
                                   <input type="email" class="validate" name="email" value="<?php if (isset($email)) {
                                                                                                echo $email;
                                                                                            }  ?>">
                                   <label class="light-blue-text" for="Email">Email<font color=red> *</font></label>
                               </div>



                               <div class="input-field col s6">
                                   <i class="material-icons prefix">fingerprint</i>
                                   <input name="matricule" type="text" class="validate" value="<?php if (isset($matricule)) {
                                                                                                    echo $matricule;
                                                                                                }   ?>">
                                   <label class="light-blue-text" for="Matricule">Matricule<font color=red> *</font></label>
                               </div>
                           </div>

                           <div class="row">
                               <div class="input-field col s6">
                                   <i class="material-icons prefix">date_range</i>
                                   <input name="date" type="date" class="datepicker" value="<?php if (isset($datenaissance)) {
                                                                                                echo $datenaissance;
                                                                                            } ?>">
                                   <label class="light-blue-text" for="icon_prefix">Date de Naissance<font color=red> *</font></label>
                               </div>
                               <div class="input-field col s6">
                                   <i class="material-icons prefix">phone</i>
                                   <input id="icon_telephone" type="tel" name="tel" class="validate" value="<?php if (isset($tel)) {
                                                                                                                echo $tel;
                                                                                                            } ?>">
                                   <label class="light-blue-text" for="icon_telephone">Telephone<font color=red> *</font></label>
                               </div>
                           </div>

                           <h6 class="light-blue-text">Selectionner la categorie de l 'Etudiant <font color=red> *</font>
                           </h6>
                           <p id="non">
                               <label>
                                   <input class="with-gap" name="group1" id="non" type="radio" />
                                   <span class="light-blue-text">Non Boursier</span>
                               </label>
                           </p>
                           <p id="boursier">
                               <label>
                                   <input class="with-gap" name="group1" type="radio" id="boursier" />
                                   <span class="light-blue-text">Boursier</span>
                               </label>
                           </p>
                           <p id="loge">
                               <label>
                                   <input class="with-gap" name="group1" id="loge" type="radio" />
                                   <span class="light-blue-text">Logé</span>
                               </label>
                           </p>


                           <div class="input-field col s12" id="Adresse" hidden>
                               <i class="material-icons prefix">home</i>
                               <input name="adresse" type="text" class="validate">
                               <label for="adresse" class="light-blue-text">Adresse <font color=red> *</font></label>

                           </div>

                           <br>

                           <div id="typedebourse" hidden>
                               <label class="light-blue-text">Type de Bourse <font color=red> *</font></label>
                               <select class="browser-default" name="type">
                                   <option value=""> </option>
                                   <?php
                                    $typee = new Serviceetudiant();

                                    foreach ($typee->findAll("type") as $libe) {
                                        echo " <option class=\"light-blue-text\" value=$libe->id_type> $libe->libelle</option> ";
                                    }
                                    ?>

                               </select>
                           </div>


                           <div id="chambre" hidden>
                               <label class="light-blue-text">Chambre <font color=red> *</font></label>
                               <select class="browser-default" name="chambre">
                                   <option value=""> </option>
                                   <?php
                                    $ch = new Serviceetudiant();
                                    foreach ($ch->findAll("chambre") as $val) {
                                        echo " <option class=\"light-blue-text\" value=$val->id_chambre> $val->nomchambre</option> ";
                                    }

                                    ?>


                               </select>
                           </div>
                           <br>
                           <br>
                           <label class="light-blue-text">
                               <input type="submit" value="AJOUTER" class="waves-effect waves light-blue text  btn text" name="ajouter">
                           </label>

                       </form>
                       <?php
                        if (isset($eurreur)) {
                            echo $eurreur;
                        }
                        ?>

                   </div>


               </div>
           </div>




           <script>
               document.addEventListener('DOMContentLoaded', function() {
                   var elems = document.querySelectorAll('.sidenav');
                   var instances = M.Sidenav.init(elems, options);
               });

               // Or with jQuery

               $(document).ready(function() {
                   $('.sidenav').sidenav();
               });


               document.addEventListener('DOMContentLoaded', function() {
                   var elems = document.querySelectorAll('.sidenav');
                   var instances = M.Sidenav.init(elems, options);
               });

               // Initialize collapsible (uncomment the lines below if you use the dropdown variation)
               // var collapsibleElem = document.querySelector('.collapsible');
               // var collapsibleInstance = M.Collapsible.init(collapsibleElem, options);

               // Or with jQuery

               $(document).ready(function() {
                   $('.sidenav').sidenav();
               });
           </script>



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
       <!--     <script>
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('select');
                var instances = M.FormSelect.init(elems, options);
            });

            $(document).ready(function() {
                $('select').formSelect();
            });
        </script> -->


   </body>

   </html>