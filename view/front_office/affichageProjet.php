<?php
include_once '../../Model/projet.php';
include_once '../../Controller/projetC.php';

$projetC = new projetC();

// Add a project
if (isset($_POST["nom_projet"], $_POST["nom_realisateur"], $_POST["niveau_etudes"], $_POST["email"], $_POST["time"], $_POST["domaine"], $_POST["budget"], $_POST["description"])) {
    $nom_projet = $_POST["nom_projet"];
    $nom_realisateur = $_POST["nom_realisateur"];
    $niveau_etudes = $_POST["niveau_etudes"];
    $email = $_POST["email"];
    $time = $_POST["time"];
    $domaine = $_POST["domaine"];
    $budget = $_POST["budget"];
    $description = $_POST["description"];

    if (!empty($nom_projet) && !empty($nom_realisateur) && !empty($niveau_etudes) && !empty($email) && !empty($time) && !empty($domaine) && !empty($budget) && !empty($description)) {
        $projet = new projet($nom_projet, $nom_realisateur, $niveau_etudes, $email, $time, $domaine, $budget, $description);
        $projetC->ajouterProjet($projet);
        // Rediriger vers la page d'affichage des projets après l'ajout
        header('Location: affichageProjet.php');
        exit;
    } else {
        $error = "Missing information";
    }
}
if (isset($_SESSION['success_message'])) {
    echo '<div class="alert alert-success" role="alert">' . $_SESSION['success_message'] . '</div>';
    // Supprimez le message de succès après l'affichage
    unset($_SESSION['success_message']);
}

// Affichez les messages d'erreur s'il y en a
if (!empty($error)) {
    echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage Projet - 5ademni Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Additional CSS styles for better design */
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f8f9fc;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content-wrapper {
            flex-grow: 1;
            padding-top: 20px;
        }

        .page-header {
            margin-bottom: 20px;
            text-align: center;
        }

        /* Ajout du style pour l'image */
        .project-image {
            width: 100%;
            max-width: 200px;
            margin: 0 auto;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <header class="header fixed-top d-flex align-items-center">
        <!-- Votre en-tête ici -->
    </header>

    <div class="wrapper">
        <!-- Affichage de l'image correspondant au domaine du projet -->
        <?php
        if (isset($_POST["domaine"])) {
            $domaine = $_POST["domaine"];
            if ($domaine === "developpement") {
                echo '<img src="../image/projetDev.jpg" alt="Image Projet Développement" class="project-image">';
            } elseif ($domaine === "business") {
                echo '<img src="../image/projetBusiness.jpg" alt="Image Projet Business" class="project-image">';
            } else {
                echo '<img src="../image/projetMarketing.jpg" alt="Image Projet Marketing" class="project-image">';
            }
        }
        ?>
    
        <div class="content-wrapper">
            <!-- Le reste de votre contenu HTML -->
        </div>
    </div>

    <!-- Bootstrap core JavaScript and other scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/num-orders.js"></script>
</body>
</html>

