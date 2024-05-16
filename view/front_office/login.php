<?php
 ob_start();
 session_start();
include_once '../../Model/admin.php';
include_once '../../Controller/adminC.php';



$adminC = new adminC();

if (
  isset($_POST['email']) &&
  isset($_POST['mdp'])
) {
  if (
    !empty($_POST['email']) &&
    !empty($_POST['mdp'])
  ) {
    $email = $_POST['email'];
    $_SESSION['id'] = $adminC->search_id_withemail($email);


    // Vérifier si l'adresse e-mail se termine par "@5ademni.tn"
    if (strpos($email, '@5ademni.tn') !== false) {
      $listeA = $adminC->searchLogin($_POST['email'], $_POST['mdp']);
      foreach ($listeA as $ad) {
        $adminC->setConn($_POST['email'], $_POST['mdp']);
        $_SESSION['e'] = $_POST["email"];

        header('Location: ../back_office/affichageAdmin.php');
      }
    } else {

      header('Location: ../front_office/index.php');
    }
  } else {
    // Gérer le cas où des champs sont vides
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>5ademni login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <div class="login-dark">
    <form method="post">
      <h2 class="sr-only">Login Form</h2>
      <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
      <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
      <div class="form-group"><input class="form-control" type="password" name="mdp" placeholder="Password"></div>
      <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Log In</button></div><a href="inscription.php" class="forgot">Create your account</a>
    </form>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<style>
  .login-dark {
    height: 1000px;
    background-image: url("https://img.freepik.com/vecteurs-libre/illustration-isometrique-poste-vacant-responsable-ressources-humaines-recherche-ecran-ordinateur-portable-cv-illustration-vectorielle-candidats_1284-81713.jpg?t=st=1711499091~exp=1711502691~hmac=6236e524093a91d04f234b67679737f1d4b54d4a96963c8488262bf48e359be2&w=740");
    background-size: cover;
    position: relative;
  }

  .login-dark form {
    max-width: 320px;
    width: 90%;
    background-color: black;
    padding: 40px;
    border-radius: 4px;
    transform: translate(-50%, -50%);
    position: absolute;
    top: 50%;
    left: 50%;
    color: #fff;
    box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.2);
  }

  .login-dark .illustration {
    text-align: center;
    padding: 15px 0 20px;
    font-size: 100px;
    color: #fff;
  }

  .login-dark form .form-control {
    background: none;
    border: none;
    border-bottom: 1px solid #434a52;
    border-radius: 0;
    box-shadow: none;
    outline: none;
    color: inherit;
  }

  .login-dark form .btn-primary {
    background: blue;
    border: none;
    border-radius: 4px;
    padding: 11px;
    box-shadow: none;
    margin-top: 26px;
    text-shadow: none;
    outline: none;
  }

  .login-dark form .btn-primary:hover,
  .login-dark form .btn-primary:active {
    background: #214a80;
    outline: none;
  }

  .login-dark form .forgot {
    display: block;
    text-align: center;
    font-size: 12px;
    color: #6f7a85;
    opacity: 0.9;
    text-decoration: none;
  }

  .login-dark form .forgot:hover,
  .login-dark form .forgot:active {
    opacity: 1;
    text-decoration: none;
  }

  .login-dark form .btn-primary:active {
    transform: translateY(1px);
  }
</style>