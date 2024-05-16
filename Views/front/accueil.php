<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sélectionner un domaine</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        p {
            font-size: 16px;
            margin-bottom: 10px;
        }
        .domaine-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .domaine-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 18px;
            transition: all 0.3s ease;
        }
        .domaine-button:hover {
            background-color: #0056b3;
        }
    </style>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>5ademni Online Job Portal</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/owl.carousel.min.css" rel="stylesheet">

        <link href="css/owl.theme.default.min.css" rel="stylesheet">

        <link href="css/tooplate-gotto-job.css" rel="stylesheet">
        
</head>
<body>
    <nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="index.html">
            <img src="images/logo.png" class="img-fluid logo-image">
            <div class="d-flex flex-column">
                <a class="logo-text">5ademni</a>
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav" style="margin-top: 5px;">
            <ul class="navbar-nav align-items-center ms-lg-5">
                <li class="nav-item">
                    <a class="nav-link active" href="index.html">Page d'accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About 5ademni</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Projet et Postuler</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="ajouterPostulation.php">Postuler</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item ms-lg-auto">
                    <a href="login.php" class="nav-link">Register</a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="btn btn-primary py-2 px-4">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
        <h1>Trouvez le projet selon le domaine</h1>
        <p>Domaines disponibles :</p>
        <div class="domaine-container">
            <!-- Affichage des boutons pour chaque domaine -->
            <?php
            include_once '../../Controller/projetC.php';
            $c = new projetC();
            $domaines = $c->getDomaines(); // Récupérer tous les domaines disponibles
            foreach ($domaines as $domaine) {
                echo '<a href="developpement.php?domaine=' . urlencode($domaine) . '" class="domaine-button">' . $domaine . '</a>';
            }
            ?>
        </div>      
    </div>
        <main>
        <section class="hero-section d-flex justify-content-center align-items-center">
</section>


            <section class="job-section recent-jobs-section section-padding">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-12 mb-4">
                            <h2>Recent Projects</h2>
                            <p><strong>Over 10k opening projects</strong> Lorem Ipsum dolor sit amet, consectetur adipsicing kengan omeg kohm tokito adipcingi elit eismuod larehai</p>
                        </div>
                        <div class="clearfix"></div>
</body>
</html>