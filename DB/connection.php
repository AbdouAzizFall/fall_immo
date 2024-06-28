<?php
require_once 'config.php';
try {
    $db = new PDO('mysql:host='.HOST.';port='.PORT.';dbname='.DATABASE.';charset=utf8', USER, PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Activer le mode d'affichage des erreurs PDO
} catch (PDOException $e) {
    die("Erreur de connexion à la BDD : " . $e->getMessage());
}


?>
