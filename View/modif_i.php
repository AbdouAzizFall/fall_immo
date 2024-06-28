<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <?php
            require( '../layout/header.php');
            require('../DB/connection.php');
            if (isset($_GET['id'])) {
             $id = $_GET['id'];

        // Récupérer les données de l'immeuble 
        $sql = "SELECT * FROM immeubles WHERE id_i = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
        $immeuble = $stmt->fetch(PDO::FETCH_ASSOC);

        // Si aucune donnée trouvée, rediriger ou afficher un message
       
    } else {
        echo "ID d'immeuble non fourni.";
        
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $libelle = $_POST['libelle'];
        $adresse = $_POST['adresse'];
        $equipement = $_POST['equipement'];
        $nmbr = $_POST['nmbr'];

        $sql = "UPDATE immeubles SET lib_i = ?, adresse_i = ?, equipements_i = ?, nbr_unites = ? WHERE id_i = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$libelle, $adresse, $equipement, $nmbr, $id]);

        echo "Immeuble mis à jour avec succès.";
    }

        ?>
                             
            <h1 class="display-3"> modification immeubles</h1>

            <form action="" method="POST" class="w-50"> 
        <div class="form-group">
            <label><h4>ID</h4></label>
            <input class="form-control" type="text" name="id" id="id" value="<?php echo $immeuble['id_i']; ?>" readonly />
            <label><h4>Libelle</h4></label>
            <input class="form-control" type="text" name="libelle" id="libelle" value="<?php echo $immeuble['lib_i']; ?>" />
            <label><h4>Adresse</h4></label>
            <input class="form-control" type="text" name="adresse" id="adresse" value="<?php echo $immeuble['adresse_i']; ?>" />
            <label><h4>Équipement</h4></label>
            <input class="form-control" type="text" name="equipement" id="equipement" value="<?php echo $immeuble['equipements_i']; ?>" />
            <label><h4>Nombre d'unités</h4></label>
            <input class="form-control" type="number" name="nmbr" id="nmbr" value="<?php echo $immeuble['nbr_unites']; ?>" />
        </div>
        <br/>
        <button class="btn btn-success" type="submit">Terminer</button>
        <button class="btn btn-light" type="reset">Annuler</button>
    </form>      
    
</body>
</html>