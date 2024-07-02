<?php
require('../DB/connection.php');

$sql = "SELECT * FROM admin";
$stmt = $db->query($sql);
$admins = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
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
    ?>
    <div class="container">
        <!-- Conteneur pour le bouton de déconnexion -->
        <div class="row my-3">
            <div class="col-md-12">
                <a href="#" class="btn btn-danger" onclick="confirmLogout(event)">Déconnexion</a>
            </div>
        </div>

        <h3 class="display-6">Liste des administrateurs</h3>
        <hr>
        <div class="container mt-4">
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
                                <a href="../View/modif_admin.php?id=<?php echo $admin['id_admin']; ?>" class="btn btn-primary btn-sm">Modifier</a>
                                <a href="../View/tab_admin.php?id=<?php echo $admin['id_admin']; ?>" class="btn btn-danger btn-sm">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; 
                    
                    if (isset($_GET['id']) ) {
                        $id = $_GET['id'];
                    
                        // Requête de suppression avec un placeholder
                        $sql = "DELETE FROM admin WHERE id_admin = ?";
                    
                        try {
                            // Préparation de la requête
                            $prepare = $db->prepare($sql);
                    
                            // Exécution de la requête avec le paramètre
                            $prepare->execute([$id]);
                    
                            echo " $id supprime ";
                        } catch (PDOException $e) {
                            echo "Erreur lors de la suppression de l'enregistrement : " . $e->getMessage();
                        }
                    } ?>
                </tbody>
            </table>
            <a href="../View/ajout_admin.php" class="btn btn-success mb-3">Ajouter un administrateur</a>
        </div>
    </div>

    <!-- Formulaire de déconnexion caché -->
    <form id="logout-form" action="../conn/deconnexion.php" method="POST" style="display: none;">
        <input type="hidden" name="logout" value="1">
    </form>

    <script>
        function confirmLogout(event) {
            event.preventDefault();
            if (confirm("Êtes-vous sûr de vouloir vous déconnecter ?")) {
                document.getElementById('logout-form').submit();
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-VoPFvGrZstsltdPjWzuYL6+UZF4bK2KmA0pAURWun1mz76f4o+szs0c5w+8jM2ue" crossorigin="anonymous"></script>
</body>
</html>
