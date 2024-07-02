<?php
require('../layout/header.php');

  require('../DB/connection.php');
  $sql = "select * from immeubles";
  $immeubles = $db->query($sql)->fetchAll();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Récupérer les données 
    $sql = "SELECT * FROM proprietaires WHERE id_proprietaire = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);
    $proprietaire = $stmt->fetch(PDO::FETCH_ASSOC);


} 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
   $nbr = $_POST['nbr_imm'];
   

    $sql = "UPDATE proprietaires SET nom_pro = ?, prenom_pro = ?, email_pro = ?, mot_de_passe = ?,immeuble =? WHERE id_proprietaire = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$nom, $prenom,$email, $pass,$nbr, $id]);

    echo "Propriétaire mis à jour avec succès.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Modification de Propriétaire</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="display-4">Modification de Propriétaire</h1>
        <form action="" method="POST" class="w-50">
        <div class="form-group mb-3">
                <label for="id"><h5>ID</h5></label>
                <input class="form-control" type="text" name="id" id="id" value="<?php echo $proprietaire['id_proprietaire']; ?>" readonly />
            </div>
        <div class="form-group mb-3">
                <label for="nom"><h5>Nom</h5></label>
                <input class="form-control" type="text" name="nom" id="nom"  value="<?php echo $proprietaire['nom_pro']; ?>" required />
            </div>
            <div class="form-group mb-3">
                <label for="prenom"><h5>Prénom</h5></label>
                <input class="form-control" type="text" name="prenom" id="prenom"  value="<?php echo $proprietaire['prenom_pro']; ?>" required />
            </div>
            <div class="form-group mb-3">
                <label for="prenom"><h5>email</h5></label>
                <input class="form-control" type="email" name="email" id="email"  value="<?php echo $proprietaire['email_pro']; ?>" required />
            </div>
            <div class="form-group mb-3">
                <label for="prenom"><h5>Immeuble</h5></label>
                <select name="nbr_imm" id="">
                <?php foreach ($immeubles as $immeuble) {?>
                    <option value="<?php echo $immeuble['lib_i'] ?>"> <?php echo $immeuble['lib_i'] ?></option>
              <?php  } ?>
                </select>            </div>
            <div class="form-group mb-3">
                <label for="pass"><h5>Mot de passe</h5></label>
                <input class="form-control" type="password" name="pass" id="pass" value="<?php echo $proprietaire['mot_de_passe']; ?>" required />
            </div>
            <button class="btn btn-success" type="submit">Terminer</button>
            <button class="btn btn-light" type="reset">Annuler</button>
        </form>
    </div>
</body>
</html>
