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
    
            if (strpos($email, '@5ademni.tn') !== false) {
                $listeA = $adminC->searchLogin($_POST['email'], $_POST['mdp']);
                foreach ($listeA as $ad) {
                    $adminC->setConn($_POST['email'], $_POST['mdp']);
                    $_SESSION['e'] = $_POST["email"];
    
                    header('Location: ../back_office/index.php');
                }
            } else {
              
                header('Location: ../front_office/index.php');
            }
        } else {
           
        }
    }
    
    ?>
    
    
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <title>sign in</title>
        <link rel="stylesheet" href="./style.css">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    </head>
    
    <body>
      <section> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> 
        <section>
            <span></span>
            <!-- Other span elements -->
            <div class="signin">
                <div class="content">
                    <h2>Sign In</h2>
                    <form id="login" method="post">
                        <h2 class="content">Login Form</h2>
                        <div class="inputBox"><i class="icon ion-ios-locked-outline"></i></div>
                        <div class="inputBox"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                        <div class="inputBox"><input class="form-control" type="password" name="mdp" placeholder="password"></div>
                        <div class="inputBox"></div>
                        <div class="g-recaptcha" data-sitekey="6LeXXNEpAAAAAGPz4bzmZVXg53zQUobRkeQdYttx"></div>
                        <div class="inputBox"><button class="btn btn-primary btn-block" style="background-color: #0f0" type="submit">Log In</button></div>
                        <a href="inscription.php" class="forgot" style="background-color: #0f0">Create your account</a>
                        <a href="pw_reset/mot_passe_oublier.php" class="forgot" style="background-color: #0f0">forgot password</a>
                    </form>
                </div>
            </div>
        </section>
    </body>
    
    </html>
    
    <script>
        $(document).on('submit', '#login', function() {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                alert("Please verify that you are not a robot.");
                return false; // Prevent form submission
            }
        });
    </script>
    
    
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');
    *
    {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Quicksand', sans-serif;
    }
    body 
    {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: #000;
    }
    section 
    {
      position: absolute;
      width: 100vw;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 2px;
      flex-wrap: wrap;
      overflow: hidden;
    }
    section::before 
    {
      content: '';
      position: absolute;
      width: 100%;
      height: 100%;
      background: linear-gradient(#000,#0f0,#000);
      animation: animate 5s linear infinite;
    }
    @keyframes animate 
    {
      0%
      {
        transform: translateY(-100%);
      }
      100%
      {
        transform: translateY(100%);
      }
    }
    section span 
    {
      position: relative;
      display: block;
      width: calc(6.25vw - 2px);
      height: calc(6.25vw - 2px);
      background: #181818;
      z-index: 2;
      transition: 1.5s;
    }
    section span:hover 
    {
      background: #0f0;
      transition: 0s;
    }
    
    section .signin
    {
      position: absolute;
      width: 400px;
      background: #222;  
      z-index: 1000;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px;
      border-radius: 4px;
      box-shadow: 0 15px 35px rgba(0,0,0,9);
    }
    section .signin .content 
    {
      position: relative;
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      gap: 40px;
    }
    section .signin .content h2 
    {
      font-size: 2em;
      color: #0f0;
      text-transform: uppercase;
    }
    section .signin .content .form 
    {
      width: 100%;
      display: flex;
      flex-direction: column;
      gap: 25px;
    }
    section .signin .content .form .inputBox
    {
      position: relative;
      width: 100%;
    }
    section .signin .content .form .inputBox input 
    {
      position: relative;
      width: 100%;
      background: #333;
      border: none;
      outline: none;
      padding: 25px 10px 7.5px;
      border-radius: 4px;
      color: #fff;
      font-weight: 500;
      font-size: 1em;
    }
    section .signin .content .form .inputBox i 
    {
      position: absolute;
      left: 0;
      padding: 15px 10px;
      font-style: normal;
      color: #aaa;
      transition: 0.5s;
      pointer-events: none;
    }
    .signin .content .form .inputBox input:focus ~ i,
    .signin .content .form .inputBox input:valid ~ i
    {
      transform: translateY(-7.5px);
      font-size: 0.8em;
      color: #fff;
    }
    .signin .content .form .links 
    {
      position: relative;
      width: 100%;
      display: flex;
      justify-content: space-between;
    }
    .signin .content .form .links a 
    {
      color: #fff;
      text-decoration: none;
    }
    .signin .content .form .links a:nth-child(2)
    {
      color: #0f0;
      font-weight: 600;
    }
    .signin .content .form .inputBox input[type="submit"]
    {
      padding: 10px;
      background: #0f0;
      color: #000;
      font-weight: 600;
      font-size: 1.35em;
      letter-spacing: 0.05em;
      cursor: pointer;
    }
    input[type="submit"]:active
    {
      opacity: 0.6;
      background-color: #0f0;
    }
    @media (max-width: 900px)
    {
      section span 
      {
        width: calc(10vw - 2px);
        height: calc(10vw - 2px);
      }
    }
    @media (max-width: 600px)
    {
      section span 
      {
        width: calc(20vw - 2px);
        height: calc(20vw - 2px);
      }
    }
    </style>
    
    <!-- 
     <!DOCTYPE html>
    <html>
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Untitled</title>
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
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Log In</button></div><a href="inscription.php" class="forgot">Create your account</a></form>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    </body>
    
    </html>
    <style>
        .login-dark {
      height:1000px;
      background-image: url("https://img.freepik.com/vecteurs-libre/illustration-isometrique-poste-vacant-responsable-ressources-humaines-recherche-ecran-ordinateur-portable-cv-illustration-vectorielle-candidats_1284-81713.jpg?t=st=1711499091~exp=1711502691~hmac=6236e524093a91d04f234b67679737f1d4b54d4a96963c8488262bf48e359be2&w=740") ;
      background-size:cover;
      position:relative;
    }
    
    .login-dark form {
      max-width:320px;
      width:90%;
      background-color:black;
      padding:40px;
      border-radius:4px;
      transform:translate(-50%, -50%);
      position:absolute;
      top:50%;
      left:50%;
      color:#fff;
      box-shadow:3px 3px 4px rgba(0,0,0,0.2);
    }
    
    .login-dark .illustration {
      text-align:center;
      padding:15px 0 20px;
      font-size:100px;
      color: #fff;
    }
    
    .login-dark form .form-control {
      background:none;
      border:none;
      border-bottom:1px solid #434a52;
      border-radius:0;
      box-shadow:none;
      outline:none;
      color:inherit;
    }
    
    .login-dark form .btn-primary {
      background: blue;
      border:none;
      border-radius:4px;
      padding:11px;
      box-shadow:none;
      margin-top:26px;
      text-shadow:none;
      outline:none;
    }
    
    .login-dark form .btn-primary:hover, .login-dark form .btn-primary:active {
      background:#214a80;
      outline:none;
    }
    
    .login-dark form .forgot {
      display:block;
      text-align:center;
      font-size:12px;
      color:#6f7a85;
      opacity:0.9;
      text-decoration:none;
    }
    
    .login-dark form .forgot:hover, .login-dark form .forgot:active {
      opacity:1;
      text-decoration:none;
    }
    
    .login-dark form .btn-primary:active {
      transform:translateY(1px);
    }
    
    
    </style>  -->