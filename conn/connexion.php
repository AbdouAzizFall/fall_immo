<?php
   require_once __DIR__ . '/../DB/connection.php'; 
   if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login']) && isset($_POST['password']) )    {
       $login = $_POST['login'];
       $pass = $_POST['password'];
       $fonction = $_POST['choix'];
      
       if( $fonction == "admin"){
           $sql = "select * from admin ";
           $admins = $db->query($sql)->fetchAll();
           foreach ($admins as $admin) {
           
               if($login == $admin['email'] && $pass == $admin['mot_de_passe']){

                header("Location: View/tab_admin.php");
                exit;
                   break;
               }else{
                   echo "c'est pas bon ad";
                   break;
               }
           }
       }elseif( $fonction == "locataire"){
           $sql = "select * from locataire ";
           $locs = $db->query($sql)->fetchAll();
           foreach ($locs as $loc) {
           
               if($login == $loc['email'] && $pass == $loc['mot_de_passe']){

                   header("Location: profil/locataires.php");
                   exit;
                                     
               }

       }

   }elseif( $fonction == "proprietaire"){
       $sql = "select * from proprietaires ";
       $pros = $db->query($sql)->fetchAll();
       foreach ($pros as $pro) {
       
           if($login == $pro['email_pro'] && $pass == $pro['mot_de_passe']){

            header("Location: pages/proprietaires.php");
            exit;
           }else{
               echo "c'est pas bon pro";
               break;
           }

   }
}
                   
                       
                   
   }?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion et Inscription</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        .vh-100 {
            min-height: 190vh;
        }
        .form-outline {
            position: relative;
            margin-bottom: 1.5rem;
        }
        .form-label {
            margin-bottom: 0.5rem;
        }
        .form-control {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
        }
        .header-text {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 1.25rem;
            font-weight: bold;
            color: #ffffff;
        }
        .logo-container {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
            transition: transform 0.3s ease-in-out;
        }
        .logo-container img {
            height: 70px;
            width: 70px;
            margin-right: 15px;
            transition: transform 0.3s ease-in-out;
        }
        .logo-container img:hover {
            transform: scale(1.2);
        }
        .company-name {
            font-size: 2rem;
            font-weight: bold;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(45deg, #a56170, #b48690, #d8c9cc);
            -webkit-background-clip: text;
            color: transparent;
            animation: moveText 2s linear infinite;
        }
        @keyframes moveText {
            0% {
                transform: translateX(0);
            }
            50% {
                transform: translateX(20px);
            }
            100% {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body>

<section class="vh-100" style="background-color: #9A616D;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="assets/img/moi.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <div class="logo-container">
                                    <img src="assets/img/logo.JPG" alt="LOGO">
                                    <span class="company-name">FALL IMMOBILIER</span>
                                </div>

                                <h5 id="header-text" class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Se connecter</h5>

                                <form id="login-form" method="POST">
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="login-email">
                                            <i class="fas fa-envelope"></i> Adresse email
                                        </label>
                                        <input type="email" id="login-email" class="form-control form-control-lg" name="login" required />
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="login-password">
                                            <i class="fas fa-lock"></i> Mot de passe
                                        </label>
                                        <input type="password" id="login-password" class="form-control form-control-lg" name="password" required />
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="login-profile">
                                            <i class="fas fa-user"></i> Profil
                                        </label>
                                        <select id="login-profile" class="form-control form-control-lg" name="choix" required>
                                            <option value="admin">Admin</option>
                                            <option value="proprietaire">Propriétaire</option>
                                            <option value="locataire">Locataire</option>
                                        </select>
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-dark btn-lg btn-block" type="submit">Se connecter</button>
                                    </div>

                                    <a class="small text-muted" href="#!" style="color: rgb(9, 9, 9);">Mot de passe oublié ?</a>
                                    <p class="mb-5 pb-lg-2" style="color: #e11e1e;">Pas de compte ? <a href="#!" style="color: #393f81;" onclick="toggleForm()">S'inscrire ici</a></p>
                                    <a href="#!" class="small text-muted">Conditions d'utilisation.</a>
                                    <a href="#!" class="small text-muted">Politique de confidentialité</a>
                                </form>

                                <form id="register-form" style="display:none;" method="POST">
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="register-firstname">
                                            <i class="fas fa-user"></i> Prénom
                                        </label>
                                        <input type="text" id="register-firstname" class="form-control form-control-lg" name="register_firstname" required />
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="register-lastname">
                                            <i class="fas fa-user"></i> Nom
                                        </label>
                                        <input type="text" id="register-lastname" class="form-control form-control-lg" name="register_lastname" required />
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="register-email">
                                        <i class="fas fa-map-marker-alt"></i> Adresse 
                                        </label>
                                        <input type="text" id="register-adress" class="form-control form-control-lg" name="register_adress" required />
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="register-email">
                                            <i class="fas fa-envelope"></i> email
                                        </label>
                                        <input type="text" id="register-email" class="form-control form-control-lg" name="register_email" required />
                                    </div>


                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="register-phone">
                                            <i class="fas fa-phone"></i> Téléphone
                                        </label>
                                        <input type="tel" id="register-phone" class="form-control form-control-lg" name="register_phone" required />
                                    </div>

                                    <input type="hidden" id="register-date" name="register_date">

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="register-password">
                                            <i class="fas fa-lock"></i> Mot de passe
                                        </label>
                                        <input type="password" id="register-password" class="form-control form-control-lg" name="register_password" required />
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit" style="color: rgb(248, 248, 248);" onclick="setRegisterDate()">S'inscrire</button>
                                    </div>

                                    <p class="mb-5 pb-lg-2" style="color: #12883b;">Déjà un compte ? <a href="#!" style="color: #393f81;" onclick="toggleForm()">Se connecter ici</a></p>
                                    <a href="#!" class="small text-muted">Conditions d'utilisation.</a>
                                    <a href="#!" class="small text-muted">Politique de confidentialité</a>
                                </form>
                                <?php
                              



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register_firstname'])) {
    // Récupérer les données du formulaire
    $firstname = $_POST['register_firstname'];
    $lastname = $_POST['register_lastname'];
    $address = $_POST['register_adress'];
    $email = $_POST['register_email'];
    $phone = $_POST['register_phone'];
    $password = $_POST['register_password'];
    $register_date = date("Y-m-d H:i:s"); // Récupérer la date actuelle

    // Préparer la requête d'insertion
    $sql = "INSERT INTO locataire (nom, prenom, adresse, email, telephone, date_inscription, mot_de_passe) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);

 

    try {
        // Exécuter la requête avec les valeurs
        $stmt->execute([$lastname, $firstname, $address, $email, $phone, $register_date, $password]);
        echo "Inscription réussie.";
      
        exit;
    } catch (PDOException $e) {
        echo "Erreur lors de l'inscription : " . $e->getMessage();
    }
} 


                                ?> 

    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function toggleForm() {
        var loginForm = document.getElementById('login-form');
        var registerForm = document.getElementById('register-form');
        var headerText = document.getElementById('header-text');

        if (loginForm.style.display === 'none') {
            loginForm.style.display = 'block';
            registerForm.style.display = 'none';
            headerText.innerHTML = 'Se connecter';
        } else {
            loginForm.style.display = 'none';
            registerForm.style.display = 'block';
            headerText.innerHTML = 'Créer un compte Locataire';
        }
    }

    function setRegisterDate() {
        var registerDateField = document.getElementById('register-date');
        registerDateField.value = new Date().toISOString();
    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>