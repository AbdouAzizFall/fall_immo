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
        $sql = "SELECT * FROM locataire WHERE id_locataire = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
        $locataire  = $stmt->fetch(PDO::FETCH_ASSOC);

        // Si aucune donnée trouvée, rediriger ou afficher un message
       
    } else {
        echo "ID des locataire  non fourni.";
        
    }




        ?>
                             
            <h1 class="display-3"> modification locataire </h1>

            <form action="" method="POST" class="w-50"> 

                <div class="form-group">
                    
                    <label><h4>ID</h4></label>
                    <input class="form-control" type="text" name="id" id="id" value="<?php echo $locataire['id_locataire']; ?>" readonly />
                    <label ><h4>nom</h4></label>
                    <input class="form-control" type="text" name="nom" id="nom"  value="<?php echo $locataire['nom']; ?>"/>
                    <label ><h4>prenom</h4></label>
                    <input class="form-control" type="text" name="prenom" id="prenom"  value="<?php echo $locataire['prenom']; ?>"/>
                    <label ><h4>adresse</h4></label>
                    <input class="form-control" type="text" name="adresse" id="adresse"  value="<?php echo $locataire['adresse']; ?>"/>
                    <label ><h4>email</h4></label>
                    <input class="form-control" type="email" name="email" id="email"  value="<?php echo $locataire['email']; ?>"/>
                    <label ><h4>telephone</h4></label>
                    <input class="form-control" type="number" name="tel" id="tel"  value="<?php echo $locataire['telephone']; ?>"/>
                    <label ><h4>date</h4></label>
                    <input class="form-control" type="text" name="date" id="date"  value="<?php echo $locataire['date_inscription']; ?>" readonly/>
                    <label ><h4>password</h4></label>
                    <input class="form-control" type="password" name="pass" id="pass"  value="<?php echo $locataire['pass']; ?>"/>
                    
                </div>
                <br/>

                    <button class="btn btn-success" type="submit"> terminer</button>
                    <button class="btn btn-light"  type="reset">Annuler</button>
            </form> 
            <?php 
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nom = $_POST['nom'];
                    $prenom = $_POST['prenom'];
                    $adresse = $_POST['adresse'];
                    $email = $_POST['email'];
                    $telephone = $_POST['tel'];
                    $date =  $_POST['date'];
                    $password = $_POST['pass'];
            
            
                    $sql = "UPDATE locataire SET nom = ?, prenom = ?, adresse = ?, email = ?, telephone = ?,date_inscription = ?, pass= ? WHERE id_locataire = ?";
                    $stmt = $db->prepare($sql);
                    $stmt->execute([$nom, $prenom,  $adresse ,  $email ,$telephone ,$date,$password,$id]);
            
                    echo "locataire  mis à jour avec succès.";
                }
                ?>  
    
</body>
</html>