<?php
      require('../DB/connection.php');
      $sql = "select * from immeubles";
      $immeubles = $db->query($sql)->fetchAll();
     

?>
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
        ?>
        <br>
        <br>
        <h3 class="display-6">gestion immeubles</h3>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id </th>
                    <th scope="col">libelle</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">equipement</th>
                    <th scope="col">nombre d'unite</th>
                    <th scope="col">action </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($immeubles as $immeuble) { ?>
                <tr>
                    <th scope="row"><?php echo $immeuble['id_i']?></th>
                    <td><?php echo $immeuble['lib_i']?></td>
                    <td><?php echo $immeuble['adresse_i']?></td>
                    <td><?php echo $immeuble['equipements_i']?></td>
                    <td><?php echo $immeuble['nbr_unites']?></td>
                    <td>
                          <a class="btn btn-primary" href="modif_i.php?id=<?php echo $immeuble['id_i']; ?>">modifier </a>
                          <a class="btn btn-danger" href="tab_immeubles.php?id=<?php echo $immeuble['id_i']; ?>">supprimer  </a>
                          

                    </td>
                </tr>
                <?php } 
                
                if (isset($_GET['id']) ) {
                    $id = $_GET['id'];
                
                    // Requête de suppression avec un placeholder
                    $sql = "DELETE FROM immeubles WHERE id_i = ?";
                
                    try {
                        // Préparation de la requête
                        $prepare = $db->prepare($sql);
                
                        // Exécution de la requête avec le paramètre
                        $prepare->execute([$id]);
                
                        echo " $id supprime ";
                    } catch (PDOException $e) {
                        echo "Erreur lors de la suppression de l'enregistrement : " . $e->getMessage();
                    }
                }  ?>
            </tbody>
        </table>
        <a class="btn btn-success" href="ajout_i.php">ajouter un immeuble</a>

    
 
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>