<?php
include_once "../../controller/articlesBlogC.php";
include_once '../../controller/auteursC.php';


$articlesBlogC = new ArticlesBlogC();

if (isset($_GET['addDummy'])) {
  $articlesBlogC->addDummyArticle();
  header('Location: blog.php');
  exit;
}

if (isset($_GET['delete'])) {
  $articlesBlogC->deleteArticle($_GET['delete']);
}

$AuteursC = new AuteursC();


if (isset($_GET['auteur'])) {
  $id_auteur = $_GET['auteur'];
  $articlesBlogC = $articlesBlogC->getArticlesByAuteurId($id_auteur);
} else {
  $articlesBlogC = $articlesBlogC->listArticles();
}

$auteurs = $AuteursC->listAuteurs();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["tri"])) {
  $tri = $_POST["tri"];
  if ($tri == "contenu_croissant") {
    $articlesBlogC = $articlesBlogInstance->trierArticlesParContenuCroissant();
  } else if ($tri == "contenu_decroissant") {
    $articlesBlogC = $articlesBlogInstance->trierArticlesParContenuDecroissant();
  } else if ($tri == "date_croissant") {
    $articlesBlogC = $articlesBlogInstance->trierArticlesParDateCroissante();
  } else if ($tri == "date_decroissant") {
    $articlesBlogC = $articlesBlogInstance->trierArticlesParDateDecroissante();
  }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>About 5ademni Job Portal</title>

  <!-- CSS FILES -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

  <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet" />

  <link href="css/bootstrap.min.css" rel="stylesheet" />

  <link href="css/bootstrap-icons.css" rel="stylesheet" />

  <link href="css/owl.carousel.min.css" rel="stylesheet" />

  <link href="css/owl.theme.default.min.css" rel="stylesheet" />

  <link href="css/tooplate-gotto-job.css" rel="stylesheet" />

  <link href="css/blog.css" rel="stylesheet" />

  <!--

Tooplate 2134 Gotto Job

https://www.tooplate.com/view/2134-gotto-job

Bootstrap 5 HTML CSS Template

-->
</head>

<body class="about-page" id="top">
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="index.php">
        <img src="images/logo.png" class="img-fluid logo-image" />

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
            <a class="nav-link active" href="about.html">About 5ademni</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="eventButton" role="button" data-bs-toggle="dropdown" aria-expanded="false">Événements</a>

            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="eventButton">
              <li><a class="dropdown-item" href="ajouter-evenement.html">Ajouter un événement</a></li>
              <li><a class="dropdown-item" href="trouver-evenement.html">Trouver un événement</a></li>
            </ul>
          </li>


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>

            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
              <li>
                <a class="dropdown-item" href="job-listings.html">Job Listings</a>
              </li>

              <li>
                <a class="dropdown-item" href="job-details.html">Job Details</a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add-blog.php">Ajouter blog</a>
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

  <!-- Blog Start -->

  <!--Blog Card Start-->

  <form action="blog.php" method="get">
    <select name="auteur">
      <option value="" class="btn btn-primary">Sélectionnez un auteur </option>
      <?php
      foreach ($auteurs as $auteur) {
        echo "<option value=\"" . $auteur['id_auteur'] . "\">" . $auteur['nom'] . "</option>";
      }
      ?>
    </select>
    <input type="submit" value="Trouver les articles" class="btn btn-primary">
  </form>





  </form>
  <form action="blog.php" method="post">
    <select name="tri">
      <option value="">Trier par</option>
      <option value="contenu_croissant">Contenu Croissant</option>
      <option value="contenu_decroissant">Contenu Décroissant</option>
      <option value="date_croissant">Date Croissante</option>
      <option value="date_decroissant">Date Décroissante</option>
    </select>
    <input type="submit" value="Trier">
  </form>





  <?php
  foreach ($articlesBlogC as $ArticlesBlogC) {
  ?>
    <div class="blog-card">
      <div class="meta">
        <div class="photo" style="background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-1.jpg);"></div>
        <ul class="details">
          <li class="author"><a href="#"><?php echo $ArticlesBlogC['id_auteur']; ?></a></li>
          <li class="date"><?php echo $ArticlesBlogC['datePublication']; ?></li>
          <li class="tags">
            <ul>
              <li><a href="#">Learn</a></li>
              <li><a href="#">Code</a></li>
              <li><a href="#">HTML</a></li>
              <li><a href="#">CSS</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="description">
        <h1><?php echo $ArticlesBlogC['titre']; ?></h1>
        <p><?php echo $ArticlesBlogC['contenu']; ?></p>
        <p class="read-more">
          <a href="blog-edit.php?id=<?php echo $ArticlesBlogC['id_article']; ?>" class="btn btn-primary" style="background-color: blue ; color: white;"> Modifier le blog </a>
          <br>
          <a href="?delete=<?php echo $ArticlesBlogC['id_article']; ?>" class="btn btn-primary" style="background-color: #D46F4D; color: white;">Supprimer le blog</a>
          <br>
          <a href="blog-description.php?id=<?php echo $ArticlesBlogC['id_article']; ?>" class="btn btn-primary" style="background-color: #5AD67D ; color: white;">Voir plus</a>
        </p>
      </div>
    </div>
  <?php
  }
  ?>
  <!--Blog Card END-->
  <!-- Blog END -->













  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-12 mb-3">
          <div class="d-flex align-items-center mb-4">
            <img src="images/logo.png" class="img-fluid logo-image" />

            <div class="d-flex flex-column">
              <strong class="logo-text">5ademni</strong>
              <small class="logo-slogan">Online Job Portal</small>
            </div>
          </div>

          <p class="mb-2">
            <i class="custom-icon bi-globe me-1"></i>

            <a href="#" class="site-footer-link"> www.jobbportal.com </a>
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
            <li class="footer-menu-item">
              <a href="#" class="footer-menu-link">About</a>
            </li>

            <li class="footer-menu-item">
              <a href="#" class="footer-menu-link">Blog</a>
            </li>

            <li class="footer-menu-item">
              <a href="#" class="footer-menu-link">Jobs</a>
            </li>

            <li class="footer-menu-item">
              <a href="#" class="footer-menu-link">Contact</a>
            </li>

          </ul>
        </div>

        <div class="col-lg-2 col-md-3 col-6">
          <h6 class="site-footer-title">Resources</h6>
          <ul class="footer-menu">
            <li class="footer-menu-item">
              <a href="#" class="footer-menu-link">Guide</a>
            </li>

            <li class="footer-menu-item">
              <a href="#" class="footer-menu-link">How it works</a>
            </li>

            <li class="footer-menu-item">
              <a href="#" class="footer-menu-link">Salary Tool</a>
            </li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-8 col-12 mt-3 mt-lg-0">
          <h6 class="site-footer-title">Newsletter</h6>

          <form class="custom-form newsletter-form" action="#" method="post" role="form">
            <h6 class="site-footer-title">Get notified jobs news</h6>

            <div class="input-group">
              <span class="input-group-text" id="basic-addon1"><i class="bi-person"></i></span>

              <input type="text" name="newsletter-name" id="newsletter-name" class="form-control" placeholder="yourname@gmail.com" required />

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
            <p class="copyright-text">Copyright © 5ademni </p>

            <ul class="footer-menu d-flex">
              <li class="footer-menu-item">
                <a href="#" class="footer-menu-link">Privacy Policy</a>
              </li>

              <li class="footer-menu-item">
                <a href="#" class="footer-menu-link">Terms</a>
              </li>
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
            <p>
              Design:
              <a class="sponsored-link" rel="sponsored" href="https://www.tooplate.com" target="_blank">Tooplate</a>
            </p>
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
</body>

</html>