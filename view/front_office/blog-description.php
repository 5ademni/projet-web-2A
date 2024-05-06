<?php
include_once "../../controller/articlesBlogC.php";
include_once "../../controller/commentaireC.php";
include_once "../../controller/auteursC.php";



$articlesBlogC = new ArticlesBlogC();

if (isset($_GET['id'])) {
    $id_article = $_GET['id'];
    $articlesBlog = $articlesBlogC->getArticlesById($id_article);

}

$commentaireC = new CommentaireC();
if (isset($_GET['delete'])) {
    $commentaireC->deleteCommentaire($_GET['delete']);
}

$commentaireC = new CommentaireC();
$commentaires = $commentaireC->listCommentaires();

// Function to get the author's name based on ID
function getAuteur($nom)
{
    $auteurC = new AuteursC(); // Assuming AuteursC is the class for managing authors
    $auteur = $auteurC->getAuteur($nom); // Assuming getAuteur is a method to fetch author info by name
    return $auteur; // Return the fetched author information
}

$auteur = getAuteur($articlesBlog[0]['id_auteur']); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define patterns for validation
    $commentairePattern = "/^.{3,}$/"; // At least 3 characters

    // Get the value of commentaire from $_POST
    $commentaire = $_POST['commentaire'];

    // Validate commentaire
    if (!preg_match($commentairePattern, $commentaire)) {
        echo "Commentaire must be at least 3 characters long";
    } else {
        // Process the form (save to database, etc.)
        // Redirect or display success message
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
                        <a class="nav-link" href="about.html">About Gotto</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="eventButton" role="button" data-bs-toggle="dropdown" aria-expanded="false">Événements</a>

                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="eventButton">
                            <li><a class="dropdown-item" href="ajouter-evenement.html">Ajouter un événement</a></li>
                            <li><a class="dropdown-item" href="trouver-evenement.html">Trouver un événement</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="job-listings.php">Jobs</a>
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
                        <h1 class="text-white">Details du blog</h1>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                                <li class="breadcrumb-item active" aria-current="page">Details du blog</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
        </header>






<section class="job-section section-padding pb-0">
    <div class="container">
        <div class="row">           
        <h4 class="mt-4 mb-2" hidden><?php echo $articlesBlog[0]['id_article']; ?></h4>
            <h4 class="mt-4 mb-2"><?php echo $articlesBlog[0]['titre']; ?></h4>
            <p><?php echo $articlesBlog[0]['contenu']; ?></p>
            <div class="d-flex justify-content-center flex-wrap mt-5 border-top pt-4">
                <a href="#" class="custom-btn btn mt-2">Apply now</a>
                <a href="#" class="custom-btn custom-border-btn btn mt-2 ms-lg-4 ms-3">Save this blog</a>
                <a href="blog-edit.php?id=" class="custom-btn custom-border-btn btn edit-btn mt-2 ms-lg-4 ms-3">Modifier ce blog</a>
                <div class="job-detail-share d-flex align-items-center">
                    <p class="mb-0 me-lg-4 me-3">Share:</p>
                    <a href="#" class="bi-facebook"></a>
                    <a href="#" class="bi-twitter mx-3"></a>
                    <a href="#" class="bi-share"></a>
                </div>
            </div>
        </div>

        <br>

        <div>
            <div class="row">
                <div class="col-2">
                    <img src="https://i.imgur.com/xELPaag.jpg" width="70" class="rounded-circle mt-2" />
                </div>

                <div class="col-md-10">
    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="card-title">Ajouter un commentaire</h4>

            <form action="comments.php" method="post">
                <!-- Add fields for id_article, id_auteur, and datePublication -->
                <input type="hidden" name="id_article" value="<?php echo $articlesBlog[0]['id_article']; ?>">
                <input type="hidden" name="id_commentaire"> <!-- Assuming you have a default author ID -->
                <input type="hidden" name="nom" value="<?php echo $auteur['id_auteur']; ?>">
                <input name="dateCommentaire" value="<?php echo date('Y-m-d H:i:s'); ?>"> <!-- Current timestamp -->

                <div class="mb-3">
                    <label for="commentaire" class="form-label">Commentaire</label>
                    <textarea class="form-control" name="commentaire" placeholder="Écrire votre commentaire ici" rows="4"></textarea>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="reset" class="btn btn-secondary btn-sm">Annuler</button>
                    <button type="submit" class="btn btn-primary btn-sm ms-md-2">Envoyer <i class="fa fa-long-arrow-right ms-1"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title mb-0">Commentaires existants</h4>
                </div>
                <div class="card-body">
    <?php foreach ($commentaires as $commentaire): ?>
        <?php if ($commentaire['id_article'] == $articlesBlog[0]['id_article']): ?>
            <div class="card border-primary mb-3">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h5 class="card-title mb-0">#<?php echo $commentaire['nom']; ?></h5>
            </div>
            <div>
                <small class="text-muted"><?php echo $commentaire['dateCommentaire']; ?></small>
            </div>
        </div>
    </div>
    <div class="card-body">
        <p class="card-text"><?php echo $commentaire['commentaire']; ?></p>
    </div>
    <div class="card-footer d-flex justify-content-between">
    <a href="?delete=<?php echo $commentaire['id_commentaire']; ?>" class="btn btn-primary delete-btn" style="background-color: #D46F4D; color: white;">Supprimer le commentaire</a>
    <a href="comment-editv2.php?id=<?php echo $commentaire['id_commentaire']; ?>" class="btn btn-primary" style="background-color: blue; color: white;">Modifier le commentaire</a>
</div>

</div>
 
        <?php endif; ?>
    <?php endforeach; ?>
</div>

            </div>
        </div>
    </div>
</div>


                </div>
            </div>
        </div>
    </div></div>

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
                        <p class="copyright-text">Copyright © 5ademni 2024</p>

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
    <script>
    document.querySelectorAll('.delete-btn').forEach(item => {
        item.addEventListener('click', event => {
            event.preventDefault(); // Prevent default action of link click
            let url = event.target.getAttribute('href'); // Get the URL from the href attribute
            fetch(url) // Send a request to the server to delete the comment
                .then(response => {
                    if (response.ok) {
                        location.reload(); // Reload the page if deletion is successful
                    } else {
                        console.error('Delete request failed');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });
</script>


    <script src="js/controle-saisie-comment.js"></script>

</body>

</html>