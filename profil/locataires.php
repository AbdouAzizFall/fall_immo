<?php
require('../DB/connection.php'); // Inclure le fichier de connexion à la base de données

// Vérifiez que la variable $db est bien définie
if (!isset($db)) {
    die('Erreur de connexion à la base de données');
}

// Récupérer les données des unités
$stmt = $db->query('SELECT * FROM unites');
$unites = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unités de Location</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #343a40;
            color: #fff;
        }
        .header h1 {
            margin: 0;
        }
        .logout-btn {
            color: #fff;
            background-color: #dc3545;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }
        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px;
            width: 300px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .card:hover img {
            transform: scale(1.1);
        }
        .card-body {
            padding: 20px;
        }
        .card-body h3 {
            margin-top: 0;
            font-size: 1.5em;
            color: #333;
        }
        .card-body p {
            margin: 0.5em 0;
            color: #666;
        }
        .card-body .price {
            font-size: 1.2em;
            color: #28a745;
        }
        .card-body .state {
            font-size: 1.1em;
            color: #dc3545;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            font-size: 1em;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 10px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Unités de Location</h1>
        <a href="#" class="logout-btn" onclick="confirmLogout(event)">Déconnexion</a>
    </div>
    <div class="container">
        <?php foreach ($unites as $unite): ?>
        <div class="card" data-unit-id="<?php echo htmlspecialchars($unite['id_u']); ?>">
            <?php 
                // Construire le chemin complet de l'image
                $imagePath = '../assets/img/' . htmlspecialchars($unite['img']);
                
                // Vérifier si le fichier existe avant de l'afficher
                if (file_exists($imagePath)) {
                    echo '<img src="' . $imagePath . '" alt="Image de l\'unité">';
                } else {
                    echo '<img src="../assets/img/placeholder.jpg" alt="Image non trouvée">';
                }
            ?>
            <div class="card-body">
                <h3>Unité <?php echo htmlspecialchars($unite['id_u']); ?></h3>
                <p>Nombre de pièces: <?php echo htmlspecialchars($unite['nbr_piece']); ?></p>
                <p>Superficie: <?php echo htmlspecialchars($unite['superficie']); ?>m²</p>
                <p class="price">Loyer mensuel: <?php echo htmlspecialchars($unite['loyer_mensuel']); ?>€</p>
                <p class="state">État: <?php echo htmlspecialchars($unite['etat']); ?></p>
                <a href="#" class="btn" onclick="openModal('<?php echo htmlspecialchars($unite['id_u']); ?>')">Réserver</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Modal de réservation -->
    <div id="reservationModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <form id="reservation-form" action="../reservation/reserve.php" method="POST">
                <input type="hidden" name="unit_id" id="unit_id">
                <label for="date_debut">Date de début:</label>
                <input type="date" id="date_debut" name="date_debut" required>
                <label for="date_fin">Date de fin:</label>
                <input type="date" id="date_fin" name="date_fin" required>
                <button type="submit" class="btn">Confirmer la réservation</button>
            </form>
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

        function openModal(unitId) {
            document.getElementById('unit_id').value = unitId;
            document.getElementById('reservationModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('reservationModal').style.display = 'none';
        }

        // Fermer le modal quand l'utilisateur clique en dehors de celui-ci
        window.onclick = function(event) {
            if (event.target == document.getElementById('reservationModal')) {
                closeModal();
            }
        }
    </script>
</body>
</html>