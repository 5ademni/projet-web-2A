<?php
include_once '../../auth/config.php';
include '../../Controller/formationC.php';
include '../../Controller/specialiteC.php';


$formationC = new formationC();
$error = "";

$list = []; // Initialize the list of formations
$forid = null;
$specialite = new SpecialiteC();
$error1 = "";
$specialites = $specialite->listspecialites();
// Check if a specialty ID has been posted
if (isset($_POST['ids']) && !empty($_POST['ids'])) {
    $forid = intval($_POST['ids']); // Convert to integer to avoid SQL injection
    $list = $formationC->listFormation($forid); // Fetch formations for the given specialty
} else {
    $list = $formationC->listFormations(); // Fetch all formations if no specialty is selected
}


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nos Formations</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap"
        rel="stylesheet">

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

<body class="job-listings-page" id="top">

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.html">
                <img src="images/logo.png" class="img-fluid logo-image">

                <div class="d-flex flex-column">
                    <a class="logo-text">5ademni</a>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                        <h1 class="text-white">Nos Formations</h1>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                                <li class="breadcrumb-item active" aria-current="page">Nos Formations</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
        </header>

        <section class="pb-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-12 mb-5 mb-lg-4">
                        <br>
                        <br>
                        <form method="post" action="">
                            <div class="form-group">
                                <select name="ids" onchange="this.form.submit()" class="form-control">
                                    <option value="">Sélectionner une spécialité</option>
                                    <?php foreach ($specialites as $specialite): ?>
                                        <option value="<?= htmlspecialchars($specialite['ids']); ?>">
                                            <?= htmlspecialchars($specialite['noms']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </form>
                        <br>
                        <br>
                        <!-- Add this input field for searching formations -->
                        <input type="text" id="formation-search" class="form-control mb-4"
                            placeholder="Search formations">

                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                // Get the input field and list of formations
                                const searchInput = document.getElementById('formation-search');
                                const formations = document.querySelectorAll('.job-thumb');

                                // Add event listener for the input field
                                searchInput.addEventListener('input', function () {
                                    const searchTerm = searchInput.value.toLowerCase();

                                    // Loop through each formation to check if it matches the search term
                                    formations.forEach(function (formation) {
                                        const title = formation.querySelector('h4').textContent.toLowerCase();
                                        const description = formation.querySelector('p').textContent.toLowerCase();

                                        // Hide or show the formation based on whether it matches the search term
                                        if (title.includes(searchTerm) || description.includes(searchTerm)) {
                                            formation.style.display = 'block';
                                        } else {
                                            formation.style.display = 'none';
                                        }
                                    });
                                });
                            });
                        </script>

                    </div>
                </div>

                <div class="row justify-content-center">
                    <?php foreach ($list as $formation): ?>
                        <div class="col-lg-4 col-md-6 col-12 mb-4">
                            <div class="job-thumb job-thumb-box">
                                <div class="job-image-box-wrap">
                                    <a href="formation-details.php?id=<?php echo $formation['id_formation']; ?>">
                                        <img src="<?php echo ("../back_office/images/" . $formation['image']); ?>"
                                            class="job-image img-fluid" alt="">
                                    </a>
                                </div>

                                <div class="job-body">
                                    <div class="d-flex align-items-center border-top pt-3">
                                        <p class="job-price mb-0">
                                            <i class="custom-icon bi-cash me-1"></i>
                                            TND <?php echo $formation['prix_formation']; ?>
                                        </p>
                                        <a href="formation-details.php?id=<?php echo $formation['id_formation']; ?>"
                                            class="custom-btn btn ms-auto">Plus de détails</a>
                                    </div>

                                    <div class="down-content">
                                        <div class="formation-info">
                                            <span class="formation-label">Titre:</span>
                                            <h4 class="formation-value"><a
                                                    href="meeting-details.php?id=<?php echo $formation['id_formation']; ?>"><?php echo $formation['titre_formation']; ?></a>
                                            </h4>
                                        </div>
                                        <div class="formation-info">
                                            <span class="formation-label">Durée:</span>
                                            <span class="formation-value"><?php echo $formation['duretotale_formation']; ?>
                                                H</span>
                                        </div>
                                        <div class="formation-info">
                                            <span class="formation-label">Description:</span>
                                            <p class="formation-value"><?php echo $formation['description_formation']; ?>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <style>
            .formation-info {
                margin-bottom: 15px;
            }

            .formation-label {
                font-weight: bold;
                display: inline-block;
                width: 100px;
                /* Adjust width as needed */
            }

            .formation-value {
                display: inline-block;
                margin-left: 10px;
            }
        </style>

        <section class="cta-section">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-10">
                        <h2 class="text-white mb-2">Over 10k opening jobs</h2>

                        <p class="text-white">Gotto Job is a free HTML CSS template for job hunting related websites.
                            This layout is based on the famous Bootstrap 5 CSS framework. Thank you for visiting
                            Tooplate website.</p>
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
                            <a class="logo-text">5ademni</a>
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

                            <input type="text" name="newsletter-name" id="newsletter-name" class="form-control"
                                placeholder="yourname@gmail.com">

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
                        <p class="copyright-text">Copyright © 5ademni 2048</p>

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
                    <!--
                    <div class="col-lg-3 col-12 mt-2 d-flex align-items-center mt-lg-0">
                        <p>Design: <a class="sponsored-link" rel="sponsored" href="https://www.tooplate.com" target="_blank">Tooplate</a></p>
                    </div>
                    -->
                    <a class="back-top-icon bi-arrow-up smoothscroll d-flex justify-content-center align-items-center"
                        href="#top"></a>

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

</body>

</html>