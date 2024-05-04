<?php
include_once "../../controller/articlesBlogC.php";
include_once "../../controller/commentaireC.php";
include_once "../../controller/auteursC.php";
include_once "../../model/commentaire.php";

$commentaireC = new CommentaireC();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer et valider le champ commentaire
    $commentaireContent = $_POST['commentaire'];

    // Vérifier si le commentaire contient au moins 3 caractères
    if (strlen($commentaireContent) < 3) {
        echo "Veuillez écrire au minimum 3 caractères pour le commentaire.";
    } else {
        // Si le champ commentaire est valide, ajouter le commentaire
        $current_date = date('Y-m-d H:i:s');

        // Créer un nouvel objet Commentaires avec le commentaire saisi
        $newComment = new Commentaires(
            null, // Laisser le champ id_commentaire vide, car il sera généré automatiquement
            $id_commentaire, // Remplacer $id_article par la valeur appropriée
            $nom, // Remplacer $nom par la valeur appropriée
            $commentaireContent, // Utiliser le commentaire saisi
            $current_date
        );

        // Appeler la méthode addCommentaire pour ajouter le nouveau commentaire
        $commentaireC->addCommentaire($newComment);

        // Rediriger vers la page appropriée après l'ajout du commentaire
        // Remplacer 'Location: page-appropriee.php' par la valeur appropriée
        $location = 'Location: blog-description.php?id=' . $id;
        header($location);
        exit;
    }
} else {
    // Check if id_commentaire is set before using it
    if (isset($_GET['id_commentaire'])) {
        $cmnt = $commentaireC->getCommentbyId($_GET['id_commentaire']);
        if (!$cmnt) {
            // Handle case where no comment is found
            echo "Commentaire introuvable.";
            exit;
        }
    } else {
        // Handle case where id_commentaire is not set in the URL
        echo "Identifiant de commentaire non défini.";
        exit;
    }
}
?>







<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gotto Job Details</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/owl.carousel.min.css" rel="stylesheet">

    <link href="css/owl.theme.default.min.css" rel="stylesheet">

    <link href="css/tooplate-gotto-job.css" rel="stylesheet">

    <!--

Tooplate 2134 Gotto Job

https://www.tooplate.com/view/2134-gotto-job

Bootstrap 5 HTML CSS Template

-->
</head>

<body id="top">

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
                        <a class="nav-link" href="about.html">About 5ademni</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="eventButton" role="button" data-bs-toggle="dropdown" aria-expanded="false">Événements</a>

                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="eventButton">
                            <li><a class="dropdown-item" href="ajouter-evenement.html">Ajouter un événement</a></li>
                            <li><a class="dropdown-item" href="trouver-evenement.html">Trouver un événement</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="job-listings.php">Commentaires</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>

                    <li class="nav-item ms-lg-auto">
                        <a class="nav-link" href="#">Register</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link custom-btn btn" href="#">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>

        <header class="site-header">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 text-center">
                        <h1 class="text-white">Détails du commentaires</h1>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                                <li class="breadcrumb-item active" aria-current="page">Détails du commentaires</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
        </header>


<form method="post" id="commentForm">
    <section class="job-section section-padding pb-0">
        <div class="container">
            <div class="row">
                <!-- Input fields for comment details -->
                <div class="col-lg-8 col-12">
            

                    <h2 class="job-title mb-0">#<?php echo $cmnt['nom']; ?></h2>
                    <div class="job-thumb job-thumb-detail">
                        <div class="d-flex flex-wrap align-items-center border-bottom pt-lg-3 pt-2 pb-3 mb-4">
                            <!-- Display comment details -->
                            <p class="job-date mb-0">
                                <i class="custom-icon bi-clock me-1"></i>
                                <?php echo $cmnt['dateCommentaire']; ?>
                            </p>
                        </div>
                        <!-- Text area for updating comment -->
                        <textarea name="commentaire" id="commentaire"><?php echo $cmnt['commentaire']; ?></textarea>
                        <!-- Error message section -->
                        <span id="commentaireError" style="color: red; display: none;">Veuillez écrire au moins 3 caractères pour le commentaire.</span>
                    </div>    

                </div>
            </div>
        </div>
    </section>
    <!-- Submit button -->
    <div class="d-flex justify-content-center flex-wrap mt-5 border-top pt-4">
        <button type="submit" class="custom-btn custom-border-btn btn edit-btn mt-2 ms-lg-4 ms-3" id="submitBtn">Modifier ce commentaire</button>
    </div>
</form>



        <div class="d-flex justify-content-center flex-wrap mt-5 border-top pt-4">

            <div class="job-detail-share d-flex align-items-center">
                <p class="mb-0 me-lg-4 me-3">Partager:</p>

                <a href="#" class="bi-facebook"></a>

                <a href="#" class="bi-twitter mx-3"></a>

                <a href="#" class="bi-share"></a>
            </div>
        </div>
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
                            <strong class="logo-text">Gotto</strong>
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

                            <input type="text" name="newsletter-name" id="newsletter-name" class="form-control" placeholder="yourname@gmail.com" required>

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
                        <p class="copyright-text">Copyright © Gotto Job 2048</p>

                        <ul class="footer-menu d-flex">
                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Privacy Policy</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Terms</a></li>
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

                    <div class="col-lg-3 col-12 mt-2 d-flex align-items-center mt-lg-0">
                        <p>Design: <a class="sponsored-link" rel="sponsored" href="https://www.tooplate.com" target="_blank">Tooplate</a></p>
                    </div>

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
    <script src="js/input_control.js"></script>


    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var commentForm = document.getElementById("commentForm");
        var commentaireField = document.getElementById("commentaire");
        var commentaireError = document.getElementById("commentaireError");

        commentForm.addEventListener("submit", function(event) {
            // Retrieve the content of the comment field
            var commentaireContent = commentaireField.value;

            // Check if the comment contains at least 3 characters
            if (commentaireContent.length < 3) {
                // Prevent the form submission
                event.preventDefault();

                // Display the error message
                commentaireError.style.display = "block";
            } else {
                // The comment is valid, hide the error message
                commentaireError.style.display = "none";
            }
        });
    });
</script>


</body>

</html>