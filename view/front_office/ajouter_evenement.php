<?php
include_once '../../controller/event2.php';
include_once '../../model/event.php';

// Créer une instance du contrôleur
$controller = new EvenementC();

// Initialiser les messages d'erreur
$id_evenement_err = $id_auteur_err = $titre_err = $contenu_err = $dateEvenement_err = $lieu_err = $prix_err = $nbPlaces_err = $image_err = $heureEvenement_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Gérer l'upload de l'image
    $target_dir = "../../sql/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    // Valider les entrées
    if (empty($_POST['id_evenement']) || !is_numeric($_POST['id_evenement'])) {
        $id_evenement_err = "Veuillez entrer un ID d'événement valide.";
    }
    
    if (empty($_POST['id_auteur']) || !is_numeric($_POST['id_auteur'])) {
        $id_auteur_err = "Veuillez entrer un ID d'auteur valide.";
    }
    if(($controller->existeid_auteur($_POST['id_auteur']))==false){
        $id_auteur_err = "Cet auteur n'existe pas.";
    }
    if (empty($_POST['titre'])) {
        $titre_err = "Veuillez entrer un titre.";
    } else {
        $titre = $_POST['titre'];
        if (!preg_match("/^[a-zA-ZÀ-ÿ ]*$/",$titre)) {
            $titre_err = "Seules les lettres et les espaces blancs sont autorisés dans le titre.";
        }
    }
    
    if (empty($_POST['contenu'])) {
        $contenu_err = "Veuillez entrer un contenu.";
    } else {
        $contenu = $_POST['contenu'];
        if (!preg_match("/^[a-zA-ZÀ-ÿ ]*$/",$contenu)) {
            $contenu_err = "Seules les lettres et les espaces blancs sont autorisés dans le contenu.";
        }
    }
    
    if (empty($_POST['dateEvenement'])) {
        $dateEvenement_err = "Veuillez entrer une date d'événement.";
    }
    if (empty($_POST['lieu'])) {
        $lieu_err = "Veuillez entrer un lieu.";
    }
    else {
        $lieu = $_POST['lieu'];
        if (!preg_match("/^[a-zA-ZÀ-ÿ ]*$/",$lieu)) {
            $lieu_err = "Seules les lettres et les espaces blancs sont autorisés dans le lieu.";
        }
    }
    if (empty($_POST['prix']) || !is_numeric($_POST['prix'])) {
        $prix_err = "Veuillez entrer un prix valide.";
    }
    if (empty($_POST['nbPlaces']) || !is_numeric($_POST['nbPlaces'])) {
        $nbPlaces_err = "Veuillez entrer un nombre de places valide.";
    }
    
    if (empty($_POST['heureEvenement'])) {
        $heureEvenement_err = "Veuillez entrer une heure d'événement.";
    }

    if (empty($id_evenement_err) && empty($id_auteur_err) && empty($titre_err) && empty($contenu_err) && empty($dateEvenement_err) && empty($lieu_err) && empty($prix_err) && empty($nbPlaces_err) && empty($image_err) && empty($heureEvenement_err)) {
        // Créer une instance de la classe Evenement
        $evenement = new Evenement(
            $_POST['id_evenement'],
            $_POST['id_auteur'],
            $_POST['titre'],
            $_POST['contenu'],
            $_POST['dateEvenement'],
            $_POST['lieu'],
            $_POST['prix'],
            $_POST['nbPlaces'],
            $target_file,
            $_POST['heureEvenement'],
        );

        // Appeler la méthode addEvenement
        try {
            $controller->addEvenement($evenement);
            echo "L'événement a été ajouté avec succès.";
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    

}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un événement</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/owl.theme.default.min.css" rel="stylesheet">
    <link href="css/tooplate-gotto-job.css" rel="stylesheet">
    <link href="css/valid.css" rel="stylesheet">

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
                            <li><a class="dropdown-item" href="trouver_id_auteur.php">Trouver un événement</a></li>
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
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
        <!-- Votre code de navigation ici -->
    </nav>
    <main>
        <header class="site-header">
            <!-- En-tête de la page -->
        </header>

        <section class="about-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <!-- Formulaire pour ajouter un événement -->
                        <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="id_evenement">ID de l'événement</label>
                            <input type="text" class="form-control" id="id_evenement" name="id_evenement" placeholder="Entrez l'ID de l'événement">
                            <span class="error"><?php echo $id_evenement_err;?></span>
                        </div>
                        <div class="form-group
                            <label for="id_auteur">ID de l'auteur</label>
                            <input type="text" class="form-control" id="id_auteur" name="id_auteur" placeholder="Entrez l'ID de l'auteur">
                            <span class="error"><?php echo $id_auteur_err;?></span>
                        </div>
                        <div class="form-group
                            <label for="titre">Titre</label>
                            <input type="text" class="form-control" id="titre" name="titre" placeholder="Entrez le titre">
                            <span class="error"><?php echo $titre_err;?></span>
                        </div>
                        <div class="form-group
                            <label for="contenu">Contenu</label>
                            <input type="text" class="form-control" id="contenu" name="contenu" placeholder="Entrez le contenu">
                            <span class="error"><?php echo $contenu_err;?></span>
                        </div>
                        <div class="form-group
                            <label for="dateEvenement">Date de l'événement</label>
                            <input type="date" class="form-control" id="dateEvenement" name="dateEvenement" placeholder="Entrez la date de l'événement">
                            <span class="error"><?php echo $dateEvenement_err;?></span>
                        </div>
                        <div class="form-group
                            <label for="lieu">Lieu</label>
                            <input type="text" class="form-control" id="lieu" name="lieu" placeholder="Entrez le lieu">
                            <span class="error"><?php echo $lieu_err;?></span>
                        </div>
                        <div class="form-group
                            <label for="prix">Prix</label>
                            <input type="text" class="form-control" id="prix" name="prix" placeholder="Entrez le prix">
                            <span class="error"><?php echo $prix_err;?></span>
                        </div>
                        <div class="form-group
                            <label for="nbPlaces">Nombre de places</label>
                            <input type="text" class="form-control" id="nbPlaces" name="nbPlaces" placeholder="Entrez le nombre de places">
                            <span class="error"><?php echo $nbPlaces_err;?></span>
                        </div>
                        <div class="form-group
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image" placeholder="Téléchargez une image">
                            <span class="error"><?php echo $image_err;?></span>
                        </div>
                        <div class="form-group
                            <label for="heureEvenement">Heure de l'événement</label>
                            <input type="time" class="form-control" id="heureEvenement" name="heureEvenement" placeholder="Entrez l'heure de l'événement">
                            <span class="error"><?php echo $heureEvenement_err;?></span>
                        </div>
                            <button type="submit" class="btn btn-primary">Ajouter un evenement</button>
                          </form>
                          
        </section>
    </main>
    <footer class="site-footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6 col-12 mb-3">
                    <div class="d-flex align-items-center mb-4">
                        <img src="images/logo.png" class="img-fluid logo-image">

                        <div class="d-flex flex-column">
                            <strong class="logo-text">5ademni</strong>
                            <small class="logo-slogan">Online Job Portal</small>
                        </div>
                    </div>  

                    <p class="mb-2">
                        <i class="custom-icon bi-globe me-1"></i>

                        <a href="#" class="site-footer-link">
                            www.jobbportal.com
                        </a>
                    </p>

                    <p class="mb-2">
                        <i class="custom-icon bi-telephone me-1"></i>

                        <a href="tel: 305-240-9671" class="site-footer-link">
                            305-240-9671
                        </a>
                    </p>

                    <p>
                        <i class="custom-icon bi-envelope me-1"></i>

                        <a href="mailto:info@yourgmail.com" class="site-footer-link">
                            info@jobportal.co
                        </a>
                    </p>

                </div>

                <div class="col-lg-2 col-md-3 col-6 ms-lg-auto">
                    <h6 class="site-footer-title">Company</h6>

                    <ul class="footer-menu">
                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">About</a></li>

                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">Blog</a></li>

                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">Jobs</a></li>

                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">Contact</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 col-6">
                    <h6 class="site-footer-title">Resources</h6>

                    <ul class="footer-menu">
                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">Guide</a></li>

                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">How it works</a></li>

                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">Salary Tool</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-8 col-12 mt-3 mt-lg-0">
                    <h6 class="site-footer-title">Newsletter</h6>

                    <form class="custom-form newsletter-form" action="#" method="post" role="form">
                        <h6 class="site-footer-title">Get notified jobs news</h6>

                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="bi-person"></i></span>

                            <input type="text" name="newsletter-name" id="newsletter-name" class="form-control" placeholder="email@gmail.com" required>

                            <button type="submit" class="form-control">
                                <i class="bi-send"></i>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="site-footer-bottom">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-12 d-flex align-items-center">
                        <p class="copyright-text">Copyright © 5ademni 2024</p>

                        <ul class="footer-menu d-flex">
                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">politique de confidentialité</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Termes</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-5 col-12 mt-2 mt-lg-0">
                        <ul class="social-icon">
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-twitter"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-facebook"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-linkedin"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-instagram"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-youtube"></a>
                            </li>
                        </ul>
                    </div>
                    <!--
                    <div class="col-lg-3 col-12 mt-2 d-flex align-items-center mt-lg-0">
                        <p>Design: <a class="sponsored-link" rel="sponsored" href="https://www.tooplate.com" target="_blank">Tooplate</a></p>
                    </div>
                    -->

                    <a class="back-top-icon bi-arrow-up smoothscroll d-flex justify-content-center align-items-center" href="#top"></a>

                </div>
            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT FILES -->
    
</body>
</html>
