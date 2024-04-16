<?php
include_once '../../controller/articlesBlogC.php';
include_once '../../model/articlesBlog.php';

// Créer une instance du contrôleur
$ArticlesBlogC = new ArticlesBlogC();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_date = date('Y-m-d H:i:s');

    $ArticlesBlog = new ArticlesBlog(

        $_POST['id_article'],
        $_POST['id_auteur'],
        $_POST['titre'],
        $_POST['contenu'],
        //$_POST['datePublication'],
        $current_date,
    );
    $ArticlesBlogC->addArticle($ArticlesBlog);
    header('Location: blog.php');
    exit;
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
                        <a class="nav-link active" href="about.html">About 5ademni</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="eventButton" role="button" data-bs-toggle="dropdown" aria-expanded="false">Événements</a>

                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="eventButton">
                            <li><a class="dropdown-item" href="ajouter-evenement.html">Ajouter un blog</a></li>
                            <li><a class="dropdown-item" href="trouver-evenement.html">Trouver un blog</a></li>
                        </ul>
                    </li>



                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>

                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                            <li><a class="dropdown-item" href="job-listings.html">blogs</a></li>

                            <li><a class="dropdown-item" href="job-details.html">détails du blogs</a></li>
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
                        <form method="POST" enctype="multipart/form-data" id="formblog">
                            <div class="form-group">
                                <label for="id_article">Id d'article</label>
                                <input type="text" class="form-control" id="id_article" name="id_article" placeholder="Entrez l'ID de l'article">
                                <div id="erreurId_article"></div>
                            </div>
                            <div class="form-group">
                                <label for="id_auteur">Id d'auteur</label>
                                <input type="text" class="form-control" id="id_auteur" name="id_auteur" placeholder="Entrez l'ID de l'auteur">
                                <div id="erreurId_auteur"></div>
                            </div>
                            <div class="form-group">
                                <label for="titre">Titre</label>
                                <input type="text" class="form-control" id="titre" name="titre" placeholder="Entrez le titre du blog">
                                <div id="erreurTitre"></div>
                            </div>
                            <div class="form-group">
                                <label for="contenu">Contenu</label>
                                <input type="text" class="form-control" id="contenu" name="contenu" placeholder="Entrez le contenu du blog">
                                <div id="erreurContenu"></div>
                            </div>
                            <div class="form-group">
                                <label for="datePublication">Date de blog</label>
                                <input type="date" class="form-control" id="datePublication" name="datePublication" placeholder="Entrez la date du blog">
                                <div id="erreurDatePublication"></div>
                            </div>
                            <button type="submit" class="btn btn-primary">Ajouter le blog</button>
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
    <script src="js/controle_saisie_front.js"></script>

</body>

</html>