<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des administrateurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
    require('../layout/header.php'); // Inclure l'en-tête commun
    require('../DB/connection.php'); // Inclure le fichier de connexion à la base de données

    // Récupérer la liste des administrateurs depuis la base de données
    $sql = "SELECT * FROM admin";
    $stmt = $db->query($sql);
    $admins = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="container mt-4">
        <h1 class="display-3">Liste des administrateurs</h1>
        <a href="ajout_admin.php" class="btn btn-success mb-3">Ajouter un administrateur</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date de création</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($admins as $admin): ?>
                    <tr>
                        <th scope="row"><?php echo $admin['id_admin']; ?></th>
                        <td><?php echo $admin['nom']; ?></td>
                        <td><?php echo $admin['prenom']; ?></td>
                        <td><?php echo $admin['email']; ?></td>
                        <td><?php echo $admin['date_creation']; ?></td>
                        <td>
                            <a href="modif_admin.php?id=<?php echo $admin['id_admin']; ?>" class="btn btn-primary btn-sm">Modifier</a>
                            <a href="suppr_admin.php?id=<?php echo $admin['id_admin']; ?>" class="btn btn-danger btn-sm">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-VoPFvGrZstsltdPjWzuYL6+UZF4bK2KmA0pAURWun1mz76f4o+szs0c5w+8jM2ue" crossorigin="anonymous"></script>
</body>
</html>
