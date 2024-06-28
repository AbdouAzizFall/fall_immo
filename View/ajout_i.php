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
     
     <div class="container mt-4">

                            
                        <h1 class="display-3"> Ajout immeubles</h1>
                        <form action="" method="POST" class="w-50"> 

                            <div class="form-group">
                                <label ><h4>Libelle</h4></label>
                                <input class="form-control" type="text" name="libelle" id="libelle" />
                                <label ><h4>Adresse</h4></label>
                                <input class="form-control" type="text" name="adresse" id="adresse" />
                                <label ><h4>equipement</h4></label>
                                <input class="form-control" type="text" name="equipement" id="equipement" />
                                <label ><h4>nombre d'unites</h4></label>
                                <input class="form-control" type="number" name="nmbr" id="nmbr" />
                            </div>
                            <br/>
                            
                                <button class="btn btn-success" type="submit"> terminer</button>
                                <button class="btn btn-light"  type="reset">Annuler</button>
                        </form>
         <?php
          if (isset($_POST['libelle']) && isset($_POST['adresse']) && isset($_POST['equipement']) && isset($_POST['nmbr'])) {

            $lib_i = $_POST['libelle'];
            $adresse_i = $_POST['adresse'];
            $equipements_i = $_POST['equipement'];
            $nbr_unites = $_POST['nmbr'];
  
            
  
                require('../DB/connection.php');
                $sql = "INSERT INTO immeubles ( id_i, lib_i, adresse_i, equipements_i, nbr_unites) VALUES (NULL, ?, ?, ?, ?);";
  
                try {
                  // Préparation de la requête
                  $prepare =$db->prepare($sql);
      
                  // Exécution de la requête avec les valeurs
                  $prepare->execute([$lib_i, $adresse_i, $equipements_i, $nbr_unites]);
      
                  echo "Enregistrement ajouté avec succès.";
              } catch (PDOException $e) {
                  echo "Erreur lors de l'ajout de l'enregistrement : " . $e->getMessage();
              }
          }
       
        
        ?>
        

    </div>
    </body>
</html>