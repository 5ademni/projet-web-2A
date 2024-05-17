<?php 
include_once '../../auth/config.php';
include '../../controller/formationC.php';

$formationC = new formationC();
$error = "";
$formation = null;

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $formation = $formationC->showFormation($id);

    // Check if a formation object is successfully retrieved
    if(!$formation) {
        $error = "Formation not found.";
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

    <title>Formation details</title>

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
                        <h1 class="text-white">Formation details</h1>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                                <li class="breadcrumb-item active" aria-current="page">Formation details</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
        </header>

        <section class="pb-5">
    <div class="container">
        <br>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <?php if(empty($error)): ?>
                <div class="meeting-single-item">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="thumb">
                                <div class="price"><span><?php echo $formation->prix_formation; ?></span></div>
                                <a href="meeting-details.php"><img src=<?php echo ("../back_office/images/" . $formation->image); ?> alt="Formation Thumbnail"></a>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="down-content">
                                <h2 class="formation-title"><a href="meeting-details.php"><?php echo $formation->titre_formation; ?></a></h2>
                                <div class="formation-info">
                                    <span class="formation-label">Durée Totale:</span>
                                    <span class="formation-value"><?php echo $formation->duretotale_formation; ?></span>
                                </div>
                                <div class="formation-info">
                                    <span class="formation-label">Prix:</span>
                                    <span class="formation-value"><?php echo $formation->prix_formation; ?></span>
                                </div>
                                <div class="formation-info">
                                    <span class="formation-label">Description:</span>
                                    <p class="formation-description"><?php echo $formation->description_formation; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                <div class="error-message"><?php echo $error; ?></div>
                <?php endif; ?>
                <div class="text-center mt-4">
                    <a href="formation-listings.php" class="btn btn-primary">Retour à la liste des formations</a>
                </div>
            </div>
        </div>
    </div>
</section>


<style>
.meeting-single-item {
    background-color: #f9f9f9;
    padding: 30px;
    border-radius: 8px;
}

.meeting-single-item .thumb img {
    width: 250px; /* Adjust width as needed */
    height: 250px; /* Adjust height as needed */
    object-fit: cover; /* Ensure the image covers the fixed size */
}


.meeting-single-item .thumb {
    border-radius: 8px;
    overflow: hidden;
}

.meeting-single-item .price {
    background-color: #e74c3c;
    color: #fff;
    padding: 5px 15px;
    position: absolute;
    top: 15px;
    right: 15px;
    border-radius: 4px;
}

.meeting-single-item .formation-title {
    font-size: 28px;
    margin-bottom: 20px;
}

.formation-info {
    margin-bottom: 15px;
    font-size: 16px;
}

.formation-label {
    font-weight: bold;
    display: inline-block;
    width: 120px;
}

.formation-description {
    font-size: 16px;
    line-height: 1.6;
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