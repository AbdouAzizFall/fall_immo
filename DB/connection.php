<?php
    require_once 'config.php';
    try {
        $db = new PDO('mysql:host='.HOST.';port='.PORT.';dbname='.DATABASE.';charset=utf8', USER, PASSWORD);
        #echo "Connexion réussie !";
    } catch (PDOException $e) {
        die("Erreur de connexion à la BDD : " . $e->getMessage());
    }