<?php
session_start(); // Démarrez la session

include_once '../../Model/projet.php';
include_once '../../Controller/projetC.php';

$projetC = new projetC();

if (
    isset($_POST["nom_projet"]) &&
    isset($_POST["nom_realisateur"]) &&
    isset($_POST["niveau_etudes"]) &&
    isset($_POST["email"]) &&
    isset($_POST["time"]) &&
    isset($_POST["domaine"]) &&
    isset($_POST["budget"]) &&
    isset($_POST["description"])
) {
    if (
        !empty($_POST["nom_projet"]) &&
        !empty($_POST["nom_realisateur"]) &&
        !empty($_POST["niveau_etudes"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["time"]) &&
        !empty($_POST["domaine"]) &&
        !empty($_POST["budget"]) &&
        !empty($_POST["description"])
    ) {
        $nom_projet = $_POST['nom_projet'];
        $nom_realisateur = $_POST['nom_realisateur'];
        $niveau_etudes = $_POST['niveau_etudes'];
        $email = $_POST['email'];
        $time = $_POST['time'];
        $domaine = $_POST['domaine'];
        $budget = $_POST['budget'];
        $description = $_POST['description'];

        $projet = new projet($nom_projet, $nom_realisateur, $niveau_etudes, $email, $time, $domaine, $budget, $description);
        $projetC->ajouterProjet($projet);

        // Définir le message de succès
        $_SESSION['success_message'] = "Le projet a été ajouté avec succès.";

        // Définir le chemin de l'image du domaine
        $imagePath = '../image/domaines/' . strtolower(str_replace(' ', '_', $domaine)) . '.jpg';

        // Afficher l'image du domaine sur la page
        echo '<img src="' . $imagePath . '" alt="Image du domaine">';

        // Rediriger après l'ajout
        header('Location:ajouterProjet.php');
        exit();
    } else {
        $error = "Missing information";
    }
}

// Vérifier si le message de succès existe et l'afficher
if (isset($_SESSION['success_message'])) {
    echo '<div class="alert alert-success" role="alert">' . $_SESSION['success_message'] . '</div>';
    // Supprimer le message de succès après l'affichage
    unset($_SESSION['success_message']);
}
?>


<!Doctype html>
<html lang="en">

<head>
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
    <style>
        #notifications-btn {
            background-color: transparent;
            border: none;
            padding: 0;
        }

        #notifications-btn img {
            width: 24px;
            height: 24px;
        }

        #notifications-btn:focus {
            outline: none;
            /* Supprime la bordure de focus */
        }

        /* Style supplémentaire pour simuler l'apparence de LinkedIn */
        #notifications-btn {
            position: relative;
        }

        #notifications-btn::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 8px;
            height: 8px;
            background-color: #e84d4d;
            /* Couleur du point de notification */
            border-radius: 50%;
        }
    </style>
</head>

<body id="top">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
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
                        <a class="nav-link active" href="index.php">Page d'accueil</a>
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


                    <!-- Bouton de notification -->
                    <li class="nav-item">
                        <button id="notifications-btn" class="nav-link">
                            <img src="../front_office/images/notifications.png" alt="Notifications">
                        </button>
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

    <main>
        <section class="hero-section d-flex justify-content-center align-items-center">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                        <div class="hero-section-text mt-5">
                            <h1 class="hero-title text-white mt-4 mb-4">L’emploi, simplifié<br>
                                <small class="text-white"> Emplois sur mesure, opportunités illimitées.</small>
                            </h1>
                            <a href="#categories-section" class="custom-btn custom-border-btn btn btn-primary">Browse Categories</a>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <form method="post" class="login-form" onsubmit="return validateForm()">
                            <h2 class="sr-only">Créer un projet</h2>
                            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
                            <div class="form-group">
                                <input id="nom_projet" class="form-control" type="text" name="nom_projet" placeholder="Nom du projet">
                            </div>
                            <div class="form-group">
                                <input id="nom_realisateur" class="form-control" type="text" name="nom_realisateur" placeholder="Nom du realisateur">
                            </div>
                            <div class="form-group">
                                <input id="niveau_etudes" class="form-control" type="text" name="niveau_etudes" placeholder="Niveau d etudes">
                            </div>
                            <div class="form-group">
                                <input id="email" class="form-control" type="text" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input id="time" class="form-control" type="number" name="time" placeholder="Temps">
                            </div>
                            <div class="form-group">
                                <input id="domaine" class="form-control" type="text" name="domaine" placeholder="Domaine">
                            </div>
                            <div class="form-group">
                                <input id="budget" class="form-control" type="number" name="budget" placeholder="Budget">
                            </div>
                            <div class="form-group">
                                <input id="description" class="form-control" type="text" name="description" placeholder="Description">
                            </div>
                            <!-- Error Message Placeholder -->
                            <div id="error-message" class="text-danger"></div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">Créer</button>
                            </div>
                        </form>
                    </div>


                    <div class="col-lg-6 col-12">
                        <div class="input-group mt-4">
                            <span class="input-group-text" id="basic-addon2"><i class="bi-geo-alt custom-icon"></i></span>
                            <input type="text" name="job-location" id="job-location" class="form-control" placeholder="Emplacement" required>
                        </div>
                    </div>

                    <div class="col-lg-12 col-12">
                        <div class="d-flex flex-wrap align-items-center mt-4 mt-lg-0">
                            <span class="text-white me-2">Mots-clés populaires:</span>
                            <div>
                                <a href="job-listings.html" class="badge bg-primary">Web design</a>
                                <a href="job-listings.html" class="badge bg-primary">Marketing</a>
                                <a href="job-listings.html" class="badge bg-primary">Service client</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="job-section recent-jobs-section section-padding">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-12 mb-4">
                        <h2>Recent Projects</h2>
                        <p><strong>Over 10k opening projects</strong> Lorem Ipsum dolor sit amet, consectetur adipsicing kengan omeg kohm tokito adipcingi elit eismuod larehai</p>
                    </div>
                    <div class="clearfix"></div>

                    <?php
                    // Assuming $projetC->getAllProjects() returns an array of projects with a 'domaine' key
                    $projects = $projetC->getAllProjects();

                    // Now you can construct the image URL using the domain names
                    foreach ($projects as $project) {
                        // Assuming 'domaine' is the key containing the domain name in each project
                        $domaine = $project['domaine'];
                        $domaine = strtolower(str_replace(' ', '_', $domaine)); // Replace spaces with underscores and convert to lowercase
                        $imagePath = 'image/domaines/'; // Replace this with the actual path to your images
                        $imageSrc = $imagePath . $domaine . '.jpg';
                        if (!file_exists($imageSrc)) {
                            $imageSrc = $imagePath . 'generic.jpg';
                        }
                        // Display each project
                        echo '<div class="col-lg-4 col-md-6 col-12">';
                        echo '<div class="job-thumb job-thumb-box">';
                        echo '<div class="job-image-box-wrap">';
                        echo '<a href="job-details.html">';
                        echo '<img src="' . $imageSrc . '" class="job-image img-fluid" alt="">';
                        echo '</a>';
                        echo '</div>';
                        echo '<div class="job-body">';
                        echo '<h4 class="job-title">';
                        echo '<a href="job-details.html" class="job-title-link">' . $project['nom_projet'] . '</a>';
                        echo '</h4>';
                        echo '<div class="d-flex align-items-center">';
                        echo '<a href="#" class="bi-bookmark ms-auto me-2"></a>';
                        echo '<a href="#" class="bi-heart"></a>';
                        echo '</div>';
                        echo '<p class="job-date">';
                        echo '<i class="custom-icon bi-clock me-1"></i>';
                        echo $project['time'] . ' hours ago';
                        echo '</p>';
                        echo '</div>';
                        echo '<div class="d-flex align-items-center border-top pt-3">';
                        echo '<p class="job-price mb-0">';
                        echo '<i class="custom-icon bi-cash me-1"></i>';
                        echo '$' . number_format($project['budget']) . ' $';
                        echo '</p>';
                        echo '<a href="ajouterPostulation.php?image=' . urlencode($imageSrc) . '&nom_projet=' . urlencode($project['nom_projet']) . '" class="custom-btn btn ms-auto">Apply now</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
        </section>
        <section class="reviews-section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <h2 class="text-center mb-5">Happy customers</h2>

                        <div class="owl-carousel owl-theme reviews-carousel">
                            <div class="reviews-thumb">

                                <div class="reviews-info d-flex align-items-center">
                                    <img src="images/avatar/portrait-charming-middle-aged-attractive-woman-with-blonde-hair.jpg" class="avatar-image img-fluid" alt="">

                                    <div class="d-flex align-items-center justify-content-between flex-wrap w-100 ms-3">
                                        <p class="mb-0">
                                            <strong>Susan L</strong>
                                            <small>Product Manager</small>
                                        </p>
                                        <div class="reviews-icons">
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="reviews-body">
                                    <img src="images/left-quote.png" class="quote-icon img-fluid" alt="">

                                    <h4 class="reviews-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</h4>
                                </div>
                            </div>

                            <div class="reviews-thumb">
                                <div class="reviews-info d-flex align-items-center">
                                    <img src="images/avatar/medium-shot-smiley-senior-man.jpg" class="avatar-image img-fluid" alt="">

                                    <div class="d-flex align-items-center justify-content-between flex-wrap w-100 ms-3">
                                        <p class="mb-0">
                                            <strong>Jack</strong>
                                            <small>Technical Lead</small>
                                        </p>

                                        <div class="reviews-icons">
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star"></i>
                                            <i class="bi-star"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="reviews-body">
                                    <img src="images/left-quote.png" class="quote-icon img-fluid" alt="">

                                    <h4 class="reviews-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</h4>
                                </div>
                            </div>

                            <div class="reviews-thumb">

                                <div class="reviews-info d-flex align-items-center">
                                    <img src="images/avatar/portrait-beautiful-young-woman.jpg" class="avatar-image img-fluid" alt="">

                                    <div class="d-flex align-items-center justify-content-between flex-wrap w-100 ms-3">
                                        <p class="mb-0">
                                            <strong>Haley</strong>
                                            <small>Sales & Marketing</small>
                                        </p>

                                        <div class="reviews-icons">
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="reviews-body">
                                    <img src="images/left-quote.png" class="quote-icon img-fluid" alt="">

                                    <h4 class="reviews-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</h4>
                                </div>
                            </div>

                            <div class="reviews-thumb">
                                <div class="reviews-info d-flex align-items-center">
                                    <img src="images/avatar/blond-man-happy-expression.jpg" class="avatar-image img-fluid" alt="">

                                    <div class="d-flex align-items-center justify-content-between flex-wrap w-100 ms-3">
                                        <p class="mb-0">
                                            <strong>Jackson</strong>
                                            <small>Dev Ops</small>
                                        </p>

                                        <div class="reviews-icons">
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star"></i>
                                            <i class="bi-star"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="reviews-body">
                                    <img src="images/left-quote.png" class="quote-icon img-fluid" alt="">

                                    <h4 class="reviews-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</h4>
                                </div>
                            </div>

                            <div class="reviews-thumb">
                                <div class="reviews-info d-flex align-items-center">
                                    <img src="images/avatar/university-study-abroad-lifestyle-concept.jpg" class="avatar-image img-fluid" alt="">

                                    <div class="d-flex align-items-center justify-content-between flex-wrap w-100 ms-3">
                                        <p class="mb-0">
                                            <strong>Kevin</strong>
                                            <small>Internship</small>
                                        </p>

                                        <div class="reviews-icons">
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="reviews-body">
                                    <img src="images/left-quote.png" class="quote-icon img-fluid" alt="">

                                    <h4 class="reviews-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="cta-section">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-10">
                        <h2 class="text-white mb-2">Over 10k opening jobs</h2>

                        <p class="text-white">If you are looking for free HTML templates, you may visit Tooplate website. If you need a collection of free templates, you can visit Too CSS website.</p>
                    </div>

                    <div class="col-lg-4 col-12 ms-auto">
                        <div class="custom-border-btn-wrap d-flex align-items-center mt-lg-4 mt-2">
                            <a href="#" class="custom-btn custom-border-btn btn me-4">Create an account</a>

                            <a href="#" class="custom-link">Post a job</a>
                        </div>
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
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>

<script>
    document.getElementById("notifications-btn").addEventListener("click", function() {
        window.location.href = "notification.php"; // Rediriger vers la page des projets postulés
    });
</script>
<script>
    function validateForm() {
        // Clear previous error messages
        document.getElementById("error-message").innerHTML = "";

        var nom_projet = document.getElementById("nom_projet").value;
        var nom_realisateur = document.getElementById("nom_realisateur").value;
        var niveau_etudes = document.getElementById("niveau_etudes").value;
        var email = document.getElementById("email").value;
        var time = document.getElementById("time").value;
        var domaine = document.getElementById("domaine").value;
        var budget = document.getElementById("budget").value;
        var description = document.getElementById("description").value;

        if (!/^[a-zA-Z ]+$/.test(nom_projet)) {
            appendErrorMessage("Le nom du projet ne doit contenir que des lettres et des espaces.");
            return false;
        }

        if (!/^[a-zA-Z ]+$/.test(nom_realisateur)) {
            appendErrorMessage("Le nom du realisateur ne doit contenir que des lettres et des espaces.");
            return false;
        }

        // Contrôle de saisie pour email
        if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
            appendErrorMessage("L'adresse email n'est pas valide.");
            return false;
        }

        // Contrôle de saisie pour time (Temps)
        if (isNaN(time) || time < 1 || time > 12) {
            appendErrorMessage("Le temps doit être un nombre entre 1 et 12.");
            return false;
        }

        // Contrôle de saisie pour domaine et description
        if (!/^[a-zA-Z ]+$/.test(domaine)) {
            appendErrorMessage("Le domaine doit contenir que des lettres.");
            return false;
        }
        return true;

        // Contrôle de saisie pour budget
        if (isNaN(budget) || budget < 100 || time > 1000) {
            appendErrorMessage("Le budget doit être un nombre entre 100 et 1000.");
            return false;
        }

        if (!/^[a-zA-Z ]+$/.test(description)) {
            appendErrorMessage("La description doit contenir que des lettres.");
            return false;
        }
        return true;

    }

    function appendErrorMessage(message) {
        var errorMessageDiv = document.getElementById("error-message");
        errorMessageDiv.innerHTML = message;
    }
</script>