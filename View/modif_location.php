<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Modification de Location</title>
</head>
<body>
    <?php
        require('../layout/header.php');
        require('../DB/connection.php');

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Récupérer les données de la location 
            $sql = "SELECT * FROM location WHERE id_location = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute([$id]);
            $location = $stmt->fetch(PDO::FETCH_ASSOC);

            // Si aucune donnée trouvée, rediriger ou afficher un message
            if (!$location) {
                echo "Aucune location trouvée pour cet ID.";
                exit;
            }
        } else {
            echo "ID de location non fourni.";
            exit;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_unite = $_POST['id_unite'];
            $id_locataire = $_POST['id_locataire'];
            $date_debut = $_POST['date_debut'];
            $date_fin = $_POST['date_fin'];
            $montant_loyer = $_POST['montant_loyer'];
            $statut_paiement = $_POST['statut_paiement'];

            $sql = "UPDATE location SET id_unite = ?, id_locataire = ?, date_debut = ?, date_fin = ?, montant_loyer = ?, statut_paiement = ? WHERE id_location = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute([$id_unite, $id_locataire, $date_debut, $date_fin, $montant_loyer, $statut_paiement, $id]);

            echo "Location mise à jour avec succès.";
        }
    ?>

    <div class="container mt-4">
        <h1 class="display-3">Modification de Location</h1>
        <form action="" method="POST" class="w-50">
            <div class="form-group">
                <label for="id_location">ID Location</label>
                <input class="form-control" type="text" name="id_location" id="id_location" value="<?php echo $location['id_location']; ?>" readonly>
                <label for="id_unite">ID de l'Unité</label>
                <input class="form-control" type="text" name="id_unite" id="id_unite" value="<?php echo $location['id_unite']; ?>" required>
                <label for="id_locataire">ID du Locataire</label>
                <input class="form-control" type="text" name="id_locataire" id="id_locataire" value="<?php echo $location['id_locataire']; ?>" required>
                <label for="date_debut">Date de Début</label>
                <input class="form-control" type="date" name="date_debut" id="date_debut" value="<?php echo $location['date_debut']; ?>" required>
                <label for="date_fin">Date de Fin</label>
                <input class="form-control" type="date" name="date_fin" id="date_fin" value="<?php echo $location['date_fin']; ?>" required>
                <label for="montant_loyer">Montant du Loyer</label>
                <input class="form-control" type="text" name="montant_loyer" id="montant_loyer" value="<?php echo $location['montant_loyer']; ?>" required>
                <label for="statut_paiement">Statut de Paiement</label>
                <select class="form-control" name="statut_paiement" id="statut_paiement" required>
                    <option value="en_retard" <?php if ($location['statut_paiement'] === 'en_retard') echo 'selected'; ?>>En retard</option>
                    <option value="paye" <?php if ($location['statut_paiement'] === 'paye') echo 'selected'; ?>>Payé</option>
                    <option value="non_paye" <?php if ($location['statut_paiement'] === 'non_paye') echo 'selected'; ?>>Non payé</option>
                </select>
            </div>
            <br>
            <button class="btn btn-success" type="submit">Terminer</button>
            <button class="btn btn-light" type="reset">Annuler</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
