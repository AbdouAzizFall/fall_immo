<?php
require('../DB/connection.php'); // Inclure le fichier de connexion à la base de données

session_start(); // Démarrer la session si nécessaire

// Vérifiez que la variable $db est bien définie
if (!isset($db)) {
    die('Erreur de connexion à la base de données');
}

// Vérifiez si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $unit_id = $_POST['unit_id'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    
    // Vous devez obtenir l'ID du locataire actuel à partir de la session ou d'une autre source
    $locataire_id = isset($_SESSION['locataire_id']) ? $_SESSION['locataire_id'] : 1; // Remplacez 1 par l'ID du locataire actuel

    // Vérifier que toutes les données sont présentes
    if (empty($unit_id) || empty($date_debut) || empty($date_fin)) {
        die('Données de réservation manquantes');
    }

    // Calculer le montant du loyer pour la période de réservation
    $stmt = $db->prepare('SELECT loyer_mensuel FROM unites WHERE id_u = ?');
    $stmt->execute([$unit_id]);
    $unite = $stmt->fetch();
    if (!$unite) {
        die('Unité non trouvée');
    }

    // Supposons que le loyer mensuel soit basé sur 30 jours
    $loyer_mensuel = $unite['loyer_mensuel'];
    $date1 = new DateTime($date_debut);
    $date2 = new DateTime($date_fin);
    $interval = $date1->diff($date2);
    $jours = $interval->days + 1; // Inclure le jour de début dans le calcul
    $montant_loyer = ($loyer_mensuel / 30) * $jours;

    // Insérer la réservation dans la base de données
    $stmt = $db->prepare('INSERT INTO location (id_unite, id_locataire, date_debut, date_fin, montant_loyer, statut_paiement) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$unit_id, $locataire_id, $date_debut, $date_fin, $montant_loyer, 'non_paye']);

    // Rediriger vers locataires.php après la réservation réussie
    header("Location: ../profil/locataires.php");
    exit(); // Assurez-vous d'appeler exit après une redirection pour arrêter l'exécution du script
}
?>
