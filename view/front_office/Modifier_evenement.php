<?php
session_start();
include_once '../../controller/event2.php';
include_once '../../model/event.php';
include_once '../../controller/Categorie_Evenement2.php';
include_once '../../controller/DomaineEV2.php';


// Créer une instance du contrôleur
$controller = new EvenementC();

// Assurez-vous d'appeler la fonction getevenementbyid pour obtenir les détails de l'événement
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $event_id = $_GET['id'];
    $evenement = $controller->getEvenement($event_id);
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "../../upload/";
    $default_image = $target_dir . "event-imagef.png"; // Chemin vers votre image par défaut

    // Vérifiez si une image a été téléchargée
    if (!empty($_FILES["image"]["name"])) {
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    } else {
        // Si aucune image n'a été téléchargée, utilisez l'image par défaut
        $target_file = $default_image;
    }
    // Créer une instance de la classe Evenement
    $evenement = new Evenement(
        $_POST['id_evenement'],
        $_POST['titre'],
        $_POST['contenu'],
        $_POST['dateEvenement'],
        $_POST['lieu'],
        $_POST['prix'],
        $_POST['nbPlaces'],
        $target_file,
        $_POST['heureEvenement'],
        $_POST['id_categorie'],
        $_POST['id_domaine'],
        $_POST['id_admin']
    );

    // Appeler la méthode updateEvenement
    
try {
    $controller->updateEvenement($_POST['id_evenement'], $evenement);
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        // supprimer le message après l'affichage
        unset($_SESSION['message']);
    }
} catch (Exception $e) {
    echo 'Erreur: ' . $e->getMessage();
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
            <a class="navbar-brand d-flex align-items-center" href="index.php">
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
                        <a class="nav-link" href="index.php">Homepage</a>
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
          <!-- Formulaire pour modifier un événement -->
          <form method="POST" enctype="multipart/form-data" id="eventf">
            <div class="form-group">
              <label for="id_evenement">ID de l'événement</label>
              <input type="text" class="form-control" id="id_evenement" name="id_evenement" value="<?php echo $evenement['id_evenement']; ?> "readonly> 
            </div>
            <div class="form-group">
              <label for="id_admin">ID de l'auteur</label>
              <input type="text" class="form-control" id="id_admin" name="id_admin" value="<?php echo $evenement['id_admin']; ?> "readonly>
            <!-- ... -->
            <div class="form-group">
            <label for="id_categorie">Catégorie</label>
            <select class="form-control select-css " id="id_categorie" name="id_categorie">
            <?php
             $categorieController = new CategorieEvenementC(); 
            $categories = $categorieController->listCategories();
            foreach ($categories as $categorie) {
            echo "<option value=\"" . $categorie['id_categorie'] . "\">" . $categorie['nom_categorie']. "</option>"; }
            ?>
            </select>
            </div>  
            <div class="form-group">
            <label for="id_domaine">Domaine</label>
            <select class="form-control select-css " id="id_domaine" name="id_domaine">
            <?php
            $domaineController = new DomaineEVC();
            $domaines = $domaineController->listDomaines();
            foreach ($domaines as $domaine) {
            echo "<option value=\"" . $domaine['id_domaine'] . "\">" . $domaine['nom_domaine']. "</option>"; }  
            ?>
            </select>
            </div>
            <div class="form-group">
              <label for="titre">Titre de l'événement</label>
              <input type="text" class="form-control" id="titre" name="titre" value="<?php echo $evenement['titre']; ?>">
            </div>
            <!-- ... -->
<div class="form-group">
  <label for="contenu">Contenu de l'événement</label>
  <input type="text" class="form-control" id="contenu" name="contenu" value="<?php echo $evenement['contenu']; ?>">
</div>
<div class="form-group">
  <label for="dateEvenement">Date de l'Evenement</label>
  <input type="date" class="form-control" id="dateEvenement" name="dateEvenement" value="<?php echo $evenement['dateEvenement']; ?>">
</div>

<script>
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  var yyyy = today.getFullYear();

  today = yyyy + '-' + mm + '-' + dd;
  document.getElementById("dateEvenement").setAttribute("min", today);
</script>

<div class="form-group">
  <label for="heureEvenement">Heure de l'Evenement</label>
  <input type="time" class="form-control" id="heureEvenement" name="heureEvenement" value="<?php echo $evenement['heureEvenement']; ?>">
</div>
<div class="form-group">
  <label for="lieu">Lieu de l'événement</label>
  <input type="text" class="form-control" id="lieu" name="lieu" value="<?php echo $evenement['lieu']; ?>">
</div>
<div class="form-group">
  <label for="prix">Prix</label>
  <input type="text" class="form-control" id="prix" name="prix" value="<?php echo $evenement['prix']; ?>">
</div>
<div class="form-group">
  <label for="image">Image</label>
  <input type="file" class="form-control" id="image" name="image" value="<?php echo $evenement['image']; ?>">
<div class="form-group">
  <label for="nbPlaces">Nombre de Places</label>
  <input type="text" class="form-control" id="nbPlaces" name="nbPlaces" value="<?php echo $evenement['nbPlaces']; ?>">
</div>
<!-- ... -->

            <button type="submit" class="btn btn-primary">Modifier l'événement</button>
            
          </form>
        </div>
      </div>
    </div>
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
    <script src="js/controlesaisiemodif.js"></script>
    
</body>
</html>


