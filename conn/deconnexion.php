<?php
session_start(); // Si vous utilisez des sessions, assurez-vous de les démarrer

if (isset($_POST['logout'])) {
    session_destroy(); // Détruire toutes les sessions
    header("Location: ../index.php"); // Rediriger vers la page de connexion
    exit;
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déconnexion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <style>
        .logout-btn {
            background-color: red;
            color: white;
            font-size: 1.25rem;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-4 text-center">
                <form method="POST" onsubmit="return confirmLogout();">
                    <button type="submit" name="logout" class="logout-btn">Déconnexion</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function confirmLogout() {
            return confirm("Êtes-vous sûr de vouloir vous déconnecter ?");
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
