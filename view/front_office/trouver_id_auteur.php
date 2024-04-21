<?php
    ob_start();
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Événements</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" type="text/css" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap"
      rel="stylesheet"
    />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/bootstrap-icons.css" rel="stylesheet" />
    <link href="css/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/owl.theme.default.min.css" rel="stylesheet" />
    <link href="css/tooplate-gotto-job.css" rel="stylesheet" />
    <link href="css/ticket.css" rel="stylesheet" />

    
    </head>
<body class="about-page" id="top">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.html">
                <img src="images/logo.png" class="img-fluid logo-image">

                <div class="d-flex flex-column">
                    <strong class="logo-text">5ademni</strong>
                    <small class="logo-slogan">Online Job Portal</small>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav align-items-center ms-lg-5">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Homepage</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="about.html">About Gotto</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="eventButton" role="button" data-bs-toggle="dropdown" aria-expanded="false">Événements</a>
                    
                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="eventButton">
                            <li><a class="dropdown-item" href="ajouter_evenement.php">Ajouter un événement</a></li>
                            <li><a class="dropdown-item" href="trouver_evenement.php">Trouver un événement</a></li>
                        </ul>
                    </li>
                    
                    
          
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>

                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                            <li><a class="dropdown-item" href="job-listings.html">Job Listings</a></li>

                            <li><a class="dropdown-item" href="job-details.html">Job Details</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                    </nav>
    <link href="https://fonts.googleapis.com/css?family=Cabin|Indie+Flower|Inknut+Antiqua|Lora|Ravi+Prakash" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"  />
    <title>Vérifier l'ID</title>
    <style>
        .form-container {
            width: 50%;
            margin: 0 auto;
        }

        .input-id, .input-time, .file-upload {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
        }

        .submit-button {
            background-color: blue;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="form-container">
    <form method="post" action="">
        <label for="id">Entrez votre ID :</label>
        <input type="text" id="id" name="id" class="input-id" required>
        <input type="submit" value="Vérifier l'ID" class="submit-button">
    </form>

    <?php
        // Incluez votre fichier de contrôleur ici
        require_once '../../controller/event2.php';

        // Créez une instance de votre contrôleur
        $controller = new EvenementC();
    
        // Vérifiez si l'ID a été entré
        if(isset($_POST['id'])) {
            // Récupérez l'ID entré
            $id_auteur = $_POST['id'];
    
            // Utilisez la fonction existeid_auteur pour vérifier si l'ID existe dans la base de données
            $existe = $controller->existeid_auteur($id_auteur);
    
            // Vérifiez si l'ID existe
            if($existe) {
                // Stockez l'ID de l'auteur dans une variable de session
                $_SESSION['id'] = $id_auteur;
                // L'ID existe, redirigez vers la page d'événement
                header('Location: trouver_evenement.php');
                exit();
            } else {
                $_SESSION['id'] = $id_auteur;
                header('Location: trouver_evenement.php');
                exit();
            }
        }
    
    ?>
</body>
</html>
