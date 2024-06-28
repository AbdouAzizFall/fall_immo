<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des propriétaires</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
    require('../layout/header.php'); // Inclure l'en-tête commun
    require('../DB/connection.php'); // Inclure le fichier de connexion à la base de données

    // Récupérer la liste des propriétaires depuis la base de données
    $sql = "SELECT * FROM proprietaires";
    $stmt = $db->query($sql);
    $proprietaires = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="container mt-4">
        <h1 class="display-3">Liste des propriétaires</h1>
        <a href="ajout_proprietaire.php" class="btn btn-success mb-3">Ajouter un propriétaire</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nombre d'immeubles</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($proprietaires as $proprietaire): ?>
                    <tr>
                        <th scope="row"><?php echo $proprietaire['id_proprietaire']; ?></th>
                        <td><?php echo $proprietaire['nom_pro']; ?></td>
                        <td><?php echo $proprietaire['prenom_pro']; ?></td>
                        <td><?php echo $proprietaire['email_pro']; ?></td>
                        <td><?php echo $proprietaire['immeubles']; ?></td>
                        <td>
                            <a href="modif_proprietaire.php?id=<?php echo $proprietaire['id_proprietaire']; ?>" class="btn btn-primary btn-sm">Modifier</a>
                            <a href="suppr_proprietaire.php?id=<?php echo $proprietaire['id_proprietaire']; ?>" class="btn btn-danger btn-sm">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-VoPFvGrZstsltdPjWzuYL6+UZF4bK2KmA0pAURWun1mz76f4o+szs0c5w+8jM2ue" crossorigin="anonymous"></script>
</body>
</html>
