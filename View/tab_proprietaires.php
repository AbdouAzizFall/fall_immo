<?php
require('../DB/connection.php');

$sql = "SELECT * FROM proprietaire";
$proprietaires = $db->query($sql)->fetchAll();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"> <!-- Ajout du fichier CSS personnalisé -->
    <title>Gestion des Propriétaires</title>

</head>
<body>
    <?php
    require('../layout/header.php');
    ?>
    <div class="container">
        <h3 class="display-6">Gestion des Propriétaires</h3>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Nombre d'immeubles</th>
                    <th scope="col">Mot de passe</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($proprietaires as $proprietaire) { ?>
                <tr>
                    <th scope="row"><?php echo $proprietaire['id']?></th>
                    <td><?php echo $proprietaire['nom']?></td>
                    <td><?php echo $proprietaire['prenom']?></td>
                    <td><?php echo $proprietaire['nbr_immeuble']?></td>
                    <td><?php echo $proprietaire['pass']?></td>
                    <td>
                        <a class="btn btn-primary" href="modif_proprietaire.php?id=<?php echo $proprietaire['id']; ?>">Modifier</a>
                        <a class="btn btn-danger" href="tab_proprietaires.php?id=<?php echo $proprietaire['id']; ?>">Supprimer</a>
                    </td>
                </tr>
                <?php } 
                
                // Supprimer le propriétaire
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];

                    $sql = "DELETE FROM proprietaire WHERE id = ?";

                    try {
                        // Préparation 
                        $prepare = $db->prepare($sql);

                        // Exécution 
                        $prepare->execute([$id]);

                        echo "Propriétaire ID $id supprimé";
                    } catch (PDOException $e) {
                        echo "Erreur lors de la suppression de l'enregistrement : " . $e->getMessage();
                    }
                } ?>
            </tbody>
        </table>
        <a class="btn btn-success" href="ajout_proprietaire.php">Ajouter un Propriétaire</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
