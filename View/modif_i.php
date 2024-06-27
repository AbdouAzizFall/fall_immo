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
                             
            <h1 class="display-3"> modification immeubles</h1>

                        <form action="" method="POST" class="w-50"> 

                            <div class="form-group">
                            <input class="form-control" type="text" name="id" id="id"  value =<?php $_GET['id']?>/>
                                <label ><h4>Libelle</h4></label>
                                <input class="form-control" type="text" name="libelle" id="libelle"  value =""/>
                                <label ><h4>Adresse</h4></label>
                                <input class="form-control" type="text" name="adresse" id="adresse" value =""/>
                                <label ><h4>equipement</h4></label>
                                <input class="form-control" type="text" name="equipement" id="equipement" value =""/>
                                <label ><h4>nombre d'unites</h4></label>
                                <input class="form-control" type="number" name="nmbr" id="nmbr" value =""/>
                            </div>
                            <br/>
                            
                                <button class="btn btn-success" type="submit"> terminer</button>
                                <button class="btn btn-light"  type="reset">Annuler</button>
                        </form>       
    
</body>
</html>