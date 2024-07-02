<?php
require('../DB/connection.php');

$sql = "SELECT * FROM location";
$locations = $db->query($sql)->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php require('../layout/header.php'); ?>
     
    <div class="container">
        <h3 class="display-6">Liste des locations</h3>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID Location</th>
                    <th scope="col">ID Unité</th>
                    <th scope="col">ID Locataire</th>
                    <th scope="col">Date de début</th>
                    <th scope="col">Date de fin</th>
                    <th scope="col">Montant du loyer</th>
                    <th scope="col">Statut de paiement</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($locations as $location): ?>
                    <tr>
                        <td><?php echo $location['id_location']; ?></td>
                        <td><?php echo $location['id_unite']; ?></td>
                        <td><?php echo $location['id_locataire']; ?></td>
                        <td><?php echo $location['date_debut']; ?></td>
                        <td><?php echo $location['date_fin']; ?></td>
                        <td><?php echo $location['montant_loyer']; ?></td>
                        <td><?php echo $location['statut_paiement']; ?></td>
                        <td>
                            <a class="btn btn-primary" href="modif_location.php?id=<?php echo $location['id_location']; ?>">Éditer</a>
                            <a class="btn btn-danger" href="tab_location.php?id=<?php echo $location['id_location']; ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a class="btn btn-success" href="ajout_location.php">Ajouter une location</a>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
