<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Ajout de Location</title>
</head>
<body>
    <?php require('../layout/header.php'); ?>
    <div class="container mt-4">
        <h1 class="display-3">Ajout de Location</h1>
        <form action="" method="POST" class="w-50">
            <div class="form-group">
                <label for="id_unite">ID de l'Unité</label>
                <input class="form-control" type="text" name="id_unite" id="id_unite" required>
                <label for="id_locataire">ID du Locataire</label>
                <input class="form-control" type="text" name="id_locataire" id="id_locataire" required>
                <label for="date_debut">Date de Début</label>
                <input class="form-control" type="date" name="date_debut" id="date_debut" required>
                <label for="date_fin">Date de Fin</label>
                <input class="form-control" type="date" name="date_fin" id="date_fin" required>
                <label for="montant_loyer">Montant du Loyer</label>
                <input class="form-control" type="text" name="montant_loyer" id="montant_loyer" required>
                <label for="statut_paiement">Statut de Paiement</label>
                <select class="form-control" name="statut_paiement" id="statut_paiement" required>
                    <option value="en_retard">En retard</option>
                    <option value="paye">Payé</option>
                    <option value="non_paye">Non payé</option>
                </select>
            </div>
            <br>
            <button class="btn btn-success" type="submit">Terminer</button>
            <button class="btn btn-light" type="reset">Annuler</button>
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id_unite = $_POST['id_unite'];
                $id_locataire = $_POST['id_locataire'];
                $date_debut = $_POST['date_debut'];
                $date_fin = $_POST['date_fin'];
                $montant_loyer = $_POST['montant_loyer'];
                $statut_paiement = $_POST['statut_paiement'];

                require('../DB/connection.php');
                $sql = "INSERT INTO location (id_unite, id_locataire, date_debut, date_fin, montant_loyer, statut_paiement) VALUES (?, ?, ?, ?, ?, ?)";

                try {
                    $prepare = $db->prepare($sql);
                    $prepare->execute([$id_unite, $id_locataire, $date_debut, $date_fin, $montant_loyer, $statut_paiement]);
                    echo "Enregistrement ajouté avec succès.";
                } catch (PDOException $e) {
                    echo "Erreur lors de l'ajout de l'enregistrement : " . $e->getMessage();
                }
            }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
