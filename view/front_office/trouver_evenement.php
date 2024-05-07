<?php
ob_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');
session_start();
var_dump($_SESSION['id']);
include_once '../../controller/event2.php';
include_once '../../controller/Categorie_Evenement2.php';
include_once '../../controller/inscriptionEvenement.php';
include_once '../../controller/domaineEV2.php';
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$Eventc = new EvenementC();
$CategorieEvenementC = new CategorieEvenementC();
$domaineEV = new DomaineEVC();

function sendEmail($to, $subject, $body, $altBody) {
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'mohamedmalek.hammami8@gmail.com';
    $mail->Password = 'vmrp zyva odds efpu';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('5ademni@esprit.tn', '5ademni Team');
    $mail->addAddress($to, 'Joe User');
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = $subject;
    $mail->AddEmbeddedImage('images/logos/5admni.png', 'logo_id');
    $mail->Body = '<img src="cid:logo_id"><br>' . $body;
    $mail->AltBody = $altBody;

    $mail->send();
}

if (isset($_GET['categorie']) && $_GET['categorie'] != '') {
    $selected_value = $_GET['categorie'];
    if (strpos($selected_value, 'cat_') === 0) {
        $categorie_id = str_replace('cat_', '', $selected_value);
        $events = $Eventc->getEventsByCategory($categorie_id);
    } else if (strpos($selected_value, 'dom_') === 0) {
        $domaine_id = str_replace('dom_', '', $selected_value);
        $events = $Eventc->getEventsByDomaine($domaine_id);
    }
} else {
    $events = $Eventc->getEvents();
}

$inscription = new inscriptionEC();

if (isset($_POST['inscription']) && isset($_POST['event_id'])) {
    $event_id = $_POST['event_id'];
    $db = config::getConnexion();
    $event = $Eventc->getEvenement($event_id);
    if (isset($event['nbPlaces']) && $event['nbPlaces'] > 0) {
        $sql = "SELECT * FROM auteur WHERE id_auteur = :id_auteur";
        $stmt = $db->prepare($sql);
        $stmt->execute([':id_auteur' => $_SESSION['id']]);
        $auteur = $stmt->fetch();
        if ($auteur) {
            if (!$inscription->estInscrit($event['id_evenement'], $_SESSION['id'])) {
                $inscription->addInscription($event['id_evenement'], $_SESSION['id']);
                $subject = "Inscription à l'événement";
                $body = "Vous êtes inscrit à l'événement " . $event['titre'] . "<br>" .
                        'Votre ID : ' . $_SESSION['id'] . "<br>" .
                        'ID de l\'événement : ' . $event['id_evenement'] . "<br>" .
                        'Titre de l\'événement : ' . $event['titre'];
                $altBody = "Vous êtes inscrit à l'événement " . $event['titre'];
                sendEmail($auteur['email'], $subject, $body, $altBody);
        
                $organisateur = $Eventc->getOrganisateur($event_id);
                $subject = "Nouvelle inscription à votre événement";
                $body = "Un nouvel utilisateur s'est inscrit à votre événement " . $event['titre'] . "<br>" .
                        'ID de l\'utilisateur : ' . $_SESSION['id'] . "<br>" .
                        'ID de l\'événement : ' . $event['id_evenement'] . "<br>" .
                        'Titre de l\'événement : ' . $event['titre'];
                $altBody = "Un nouvel utilisateur s'est inscrit à votre événement " . $event['titre'];
                sendEmail($organisateur['email'], $subject, $body, $altBody);
            }
         
        $event = $Eventc->getEvenement($event_id);
        if ($event['nbPlaces'] == 0) {
            $organisateur = $Eventc->getOrganisateur($event_id);
            $subject = "Votre événement est complet";
            $body = "Votre événement " . $event['titre'] . " est complet.";
            $altBody = "Votre événement " . $event['titre'] . " est complet.";
            sendEmail($organisateur['email'], $subject, $body, $altBody);
        }
        
    header('Location: trouver_evenement.php');
    exit;}
}}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["tri"])) {
    $tri = $_POST["tri"];
    if ($tri == "prix_croissant") {
        $events = $Eventc->trierEventsParPrixCroissant();
    } else if ($tri == "prix_decroissant") {
        $events = $Eventc->trierEventsParPrixDecroissant();
    } else if ($tri == "date_croissant") {
        $events = $Eventc->trierEventsParDateCroissante();
    } else if ($tri == "date_decroissant") {
        $events = $Eventc->trierEventsParDateDecroissante();
    }
}

$categories = $CategorieEvenementC->listCategories();
$domaines = $domaineEV->listDomaines();
ob_end_flush();

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
    <link href="css/ticket.css" rel="stylesheet">

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

    <link href="https://fonts.googleapis.com/css?family=Cabin|Indie+Flower|Inknut+Antiqua|Lora|Ravi+Prakash" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"  />
        <main>
        <style>
    form {
    text-align: center; /* Centre le formulaire */
    display: flex; /* Affiche les combo box et les boutons sur la même ligne */
    justify-content: center; /* Centre les combo box et les boutons horizontalement */
    gap: 10px; /* Ajoute un espace entre les combo box et les boutons */
}
select[name="categorie"], select[name="tri"], input[type="submit"] {
    width: 400px; /* Rend les combo box et les boutons presque deux fois plus grands */
    height: 60px;
    border: none;
    border-radius: 12px; /* Rend les combo box et les boutons bombés */
    padding: 5px;
    font-weight: bold; /* Rend le texte des combo box et des boutons en gras */
}
select[name="categorie"], select[name="tri"] {
    background: #f2f2f2;
    box-shadow: inset 0 0 10px #000000;
    outline: 1px solid #d1d1d1;
}
input[type="submit"] {
    background-color: #0000A0; /* Rend les boutons bleu foncé */
    color: white; /* Rend le texte des boutons blanc */
    font-size: 32px; /* Rend le texte des boutons presque deux fois plus grand */
}

</style>




<form action="trouver_evenement.php" method="get">
  <select name="categorie">
    <option value="">Catégorie/Domaine</option>
    <optgroup label="Catégories">
      <?php
      foreach ($categories as $categorie) {
          echo "<option value=\"cat_" . $categorie['id_categorie'] . "\">" . $categorie['nom_categorie'] . "</option>";
      }
      ?>
    </optgroup>
    <optgroup label="Domaines">
      <?php
      foreach ($domaines as $domaine) {
          echo "<option value=\"dom_" . $domaine['id_domaine'] . "\">" . $domaine['nom_domaine'] . "</option>";
      }
      ?>
    </optgroup>
  </select>
  <input type="submit" value="Rechercher">
</form>



<form action="trouver_evenement.php" method="post">
  <select name="tri">
    <option value="">Trier par</option>
    <option value="prix_croissant">Prix Croissant</option>
    <option value="prix_decroissant">Prix Décroissant</option>
    <option value="date_croissant">Date Croissante</option>
    <option value="date_decroissant">Date Décroissante</option>
  </select>
  <input type="submit" value="Trier">
</form>




      <section class="about-section">
      <div class="container">
  <h1 class="upcomming">Événements à venir</h1>
  <?php foreach ($events as $event) : ?>
    <div class="item">
      <div class="item-right">
        <h2 class="num"><?= date('d', strtotime($event['dateEvenement'])) ?></h2>
        <p class="day"><?= date('M', strtotime($event['dateEvenement'])) ?></p>
        <span class="up-border"></span>
        <span class="down-border"></span>
      </div> <!-- end item-right -->
      
      <div class="item-left">
        <p class="event"><?= $event['titre'] ?></p>
        <h2 class="title"><?= $event['contenu'] ?></h2>
        
        <div class="sce">
          <div class="icon">
            <i class="fa fa-table"></i>
          </div>
          <p><?= date('l jS F Y', strtotime($event['dateEvenement'])) ?> <br/> <?= date('H:i', strtotime($event['heureEvenement'])) ?></p>
          <img class="event-image" src="<?= $event['image'] ?>" alt="Image de l'événement" style="width:100px; height:100px; border-radius:50%;" />
        </div>
        <div class="fix"></div>
        <div class="loc">
          <div class="icon">
            <i class="fa fa-map-marker"></i>
          </div>
          <p><?= $event['lieu'] ?></p>
        </div>
        <div class="fix"></div>
        <div class="places">
          <div class="icon">
            <i class="fa fa-chair"></i>
          </div>
          <p><?= $event['nbPlaces'] ?> Places disponibles</p>
        </div>
        <div class="fix"></div>
        <?php 
        var_dump($event['id_auteur']);
        if ($event['id_auteur'] == $_SESSION['id']) : ?>
        <a href="Modifier_evenement.php?id=<?php echo $event['id_evenement'] ?>"class="modify" style="background-color: blue; color: white;">Modifier</a>
        <a href="supprimer_evenement.php?id=<?php echo $event['id_evenement'] ?>" class="delete" style="background-color: red; color: white; margin-left: 10px;">Supprimer</a>
        <?php endif; ?>
        <form method="post" action="">
    <input type="hidden" name="event_id" value="<?php echo $event['id_evenement']; ?>">
    <?php
    $isRegistered = $inscription->estInscrit($event['id_evenement'], $_SESSION['id']);
    if ($event['nbPlaces'] > 0 && !$isRegistered) : ?>
        <button class="tickets" type="submit" name="inscription"><?= $event['prix'] ?> TND </button>
    <?php elseif ($isRegistered) : ?>
        <button class="tickets inscrit" >Déjà inscrit</button>
    <?php else : ?>
        <button class="tickets cancel" >Complet</button>
    <?php endif; ?> 

</form>

         <!-- end item-left -->



      </div> <!-- end item-right -->
    </div> <!-- end item -->
  <?php endforeach; ?>
</div> 


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
    <!-- Fichiers JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
