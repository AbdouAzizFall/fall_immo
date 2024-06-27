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
     
                            
                            <h1 class="display-3"> Ajout immeubles</h1>
                        <form action="" method="POST" class="w-50"> 

                            <div class="form-group">
                                <label ><h4>nom</h4></label>
                                <input class="form-control" type="text" name="nom" id="nom" />
                                <label ><h4>prenom</h4></label>
                                <input class="form-control" type="text" name="prenom" id="prenom" />
                                <label ><h4>adresse</h4></label>
                                <input class="form-control" type="text" name="adresse" id="adresse" />
                                <label ><h4>email</h4></label>
                                <input class="form-control" type="email" name="email" id="email" />
                                <label ><h4>telephone</h4></label>
                                <input class="form-control" type="number" name="tel" id="tel" />
                                <label ><h4>password</h4></label>
                                <input class="form-control" type="password" name="pass" id="pass" />
                                
                            </div>
                            <br/>
                            
                                <button class="btn btn-success" type="submit"> terminer</button>
                                <button class="btn btn-light"  type="reset">Annuler</button>
                        </form>
         <?php
          if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['email'])  && isset($_POST['tel'])    && isset($_POST['pass'])) {

            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $adresses = $_POST['adresse'];
            $email = $_POST['email'];
            $telephone = $_POST['tel'];
            $date =  date("Y-m-d");
            $password = $_POST['pass'];




  
            
  
                require('../DB/connection.php');
                $sql = "INSERT INTO locataire ( id_locataire, nom, prenom, adresse, email , telephone , date_inscription , pass ) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?);";
  
                try {
                  // Préparation de la requête
                  $prepare =$db->prepare($sql);
      
                  // Exécution de la requête avec les valeurs
                  $prepare->execute([$nom , $prenom , $adresses , $email , $telephone , $date , $password]);
      
                  echo "Enregistrement ajouté avec succès.";
              } catch (PDOException $e) {
                  echo "Erreur lors de l'ajout de l'enregistrement : " . $e->getMessage();
              }
          }
       
        
        ?>
        
</body>
</html>