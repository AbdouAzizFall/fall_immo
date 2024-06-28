<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un administrateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
    require('../layout/header.php'); // Inclure l'en-tête commun
    require('../DB/connection.php'); // Inclure le fichier de connexion à la base de données

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Récupérer les données de l'administrateur
        $sql = "SELECT * FROM admin WHERE id_admin = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$admin) {
            echo '<div class="container mt-4"><div class="alert alert-danger" role="alert">Administrateur non trouvé.</div></div>';
            exit;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];

            // Requête de mise à jour SQL
            $sql_update = "UPDATE admin SET nom = ?, prenom = ?, email = ? WHERE id_admin = ?";
            $stmt_update = $db->prepare($sql_update);
            $stmt_update->execute([$nom, $prenom, $email, $id]);

            echo '<div class="container mt-4"><div class="alert alert-success" role="alert">Administrateur mis à jour avec succès.</div></div>';
        }
    } else {
        echo '<div class="container mt-4"><div class="alert alert-danger" role="alert">ID d\'administrateur non fourni.</div></div>';
        exit;
    }
    ?>

    <div class="container mt-4">
        <h1 class="display-3">Modifier un administrateur</h1>
        <form action="" method="POST" class="w-50">
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" class="form-control" id="id" name="id" value="<?php echo $admin['id_admin']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $admin['nom']; ?>" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $admin['prenom']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $admin['email']; ?>">
            </div>
            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="tab_admin.php" class="btn btn-secondary">Annuler</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-VoPFvGrZstsltdPjWzuYL6+UZF4bK2KmA0pAURWun1mz76f4o+szs0c5w+8jM2ue" crossorigin="anonymous"></script>
</body>
</html>
