<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un administrateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
    require('../layout/header.php'); // Inclure l'en-tête commun
    require('../DB/connection.php'); // Inclure le fichier de connexion à la base de données

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];

        // Requête d'insertion SQL
        $sql = "INSERT INTO admin (nom, prenom, email, date_creation) VALUES (?, ?, ?, current_timestamp())";

        try {
            // Préparation de la requête
            $stmt = $db->prepare($sql);

            // Exécution de la requête avec les valeurs
            $stmt->execute([$nom, $prenom, $email]);

            echo '<div class="container mt-4"><div class="alert alert-success" role="alert">Administrateur ajouté avec succès.</div></div>';
        } catch (PDOException $e) {
            echo '<div class="container mt-4"><div class="alert alert-danger" role="alert">Erreur lors de l\'ajout de l\'administrateur : ' . $e->getMessage() . '</div></div>';
        }
    }
    ?>

    <div class="container mt-4">
        <h1 class="display-3">Ajouter un administrateur</h1>
        <form action="" method="POST" class="w-50">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <button type="submit" class="btn btn-success">Ajouter</button>
            <a href="tab_admin.php" class="btn btn-secondary">Annuler</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-VoPFvGrZstsltdPjWzuYL6+UZF4bK2KmA0pAURWun1mz76f4o+szs0c5w+8jM2ue" crossorigin="anonymous"></script>
</body>
</html>
