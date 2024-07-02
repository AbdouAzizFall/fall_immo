<?php
  require('../DB/connection.php');
  $sql = "select * from immeubles";
  $immeubles = $db->query($sql)->fetchAll();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['pass'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $nbr = $_POST['nbr_imm'];
        $pass = $_POST['pass'];

        require('../DB/connection.php');
        $sql = "INSERT INTO proprietaires (id_proprietaire, nom_pro , prenom_pro, email_pro,immeuble, mot_de_passe  ) VALUES (NULL, ?, ?, ? ,?,?)";

        try {
            $prepare = $db->prepare($sql);
            $prepare->execute([$nom, $prenom,$email, $nbr,$pass]);
            echo "Enregistrement ajouté avec succès.";
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout de l'enregistrement : " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Ajout de Propriétaires</title>
</head>
<body>
    <?php
        require('../layout/header.php');
    ?>
    <div class="container mt-5">
        <h1 class="display-4">Ajout de Propriétaires</h1>
        <form action="" method="POST" class="w-50">
            <div class="form-group mb-3">
                <label for="nom"><h5>Nom</h5></label>
                <input class="form-control" type="text" name="nom" id="nom" required />
            </div>
            <div class="form-group mb-3">
                <label for="prenom"><h5>Prénom</h5></label>
                <input class="form-control" type="text" name="prenom" id="prenom" required />
            </div>
            <div class="form-group mb-3">
                <label for="prenom"><h5>email</h5></label>
                <input class="form-control" type="email" name="email" id="email" required />
            </div>
            <div class="form-group mb-3">
                <label for="prenom"><h5>immeuble</h5></label>
                <select name="nbr_imm" id="">
                <?php foreach ($immeubles as $immeuble) {?>
                    <option value="<?php echo $immeuble['lib_i'] ?>"> <?php echo $immeuble['lib_i'] ?></option>
              <?php  } ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="pass"><h5>Mot de passe</h5></label>
                <input class="form-control" type="password" name="pass" id="pass" required />
            </div>
            <button class="btn btn-success" type="submit">Ajouter</button>
            <button class="btn btn-light" type="reset">Annuler</button>
        </form>
    </div>
</body>
</html>