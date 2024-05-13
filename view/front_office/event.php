<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Événements</title>

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
                        <a class="nav-link" href="about.php">About Gotto</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="eventButton" role="button" data-bs-toggle="dropdown" aria-expanded="false">Événements</a>
                    
                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="eventButton">
                            <li><a class="dropdown-item" href="ajouter_evenement.php">Ajouter un événement</a></li>
                            <li><a class="dropdown-item" href="verifier_id_auteur.php">Trouver un événement</a></li>
                        </ul>
                    </li>
                    

                    <li class="nav-item">
                        <a class="nav-link active" href="contact.php">Contact</a>
                    </li>

                    <li class="nav-item ms-lg-auto">
                        <a class="nav-link" href="#">Register</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link custom-btn btn" href="#">Login</a>
                    </li>
                    <!-- Reste du code... -->
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
                        <h1 class="text-white">Événements</h1>
                    </div>
                </div>
            </div>
        </header>

        <section class="about-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div id="eventList">
                            <!-- Les événements seront ajoutés ici par JavaScript -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="event.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>
