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
                        <th>Chambre</th>
                        <th>Batiment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require 'Autoloader.php';
                    Autoloader::register();
                    $typee = new Serviceetudiant();

                    foreach ($typee->findloge() as $libe) {

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
                <td><?php echo $libe->nomchambre?></td>
                <td><?php echo $libe->non_bat?></td>
                
                        </tr>


                    <?php } ?>
                </tbody>

            </table>


            </div>