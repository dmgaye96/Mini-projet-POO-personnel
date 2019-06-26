<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <title>Document</title>
</head>
<body>

<br> <br>

<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Matricul </th>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Date de Naissance</th>
                <th>Email</th>
                <th>Telephone</th>
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
                <td> <?php echo $libe->matricul?></td>
                <td> <?php echo $libe->prenom?></td>
                <td><?php echo $libe->nom?></td>
                <td><?php echo $libe->datenaissance?></td>
                <td><?php echo $libe->email?></td>
                <td><?php echo $libe->tel?></td>
            </tr>
            <?php
} ?>
        </tbody>
        <tfoot>
            <tr>
            <th>Matricul </th>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Date de Naissance</th>
                <th>Email</th>
                <th>Telephone</th>
            </tr>
        </tfoot>
    </table>


<script>
$(document).ready(function() {
    $('#example').DataTable();
} );

</script>
</body>
</html>