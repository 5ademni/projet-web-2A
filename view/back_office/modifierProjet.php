<?php
// Inclure le contrôleur de projet
include_once '../../Controller/projetC.php';

// Vérifier si l'identifiant du projet est spécifié dans l'URL
if(isset($_GET['id'])) {
    // Récupérer les détails du projet
    $projetC = new projetC();
    $projet = $projetC->afficherProjetDetail($_GET['id']);

    // Vérifier si le projet existe
    if ($projet) {
        // Vérifier si le formulaire a été soumis
        if(isset($_POST['submit'])) {
            // Appeler la méthode pour modifier le projet en passant les valeurs mises à jour
            $resultat = $projetC->modifierProjet($_GET['id'], $_POST['nom_projet'], $_POST['nom_realisateur'], $_POST['niveau_etudes'], $_POST['email'], $_POST['time'], $_POST['domaine'], $_POST['budget'], $_POST['description']);

            // Vérifier si la modification a réussi
            if($resultat) {
                // Redirection vers une autre page après la modification
                header('Location: affichageProjet.php');
                exit;
            } else {
                echo "Erreur lors de la modification du projet.";
            }
        }
    } else {
        echo "Projet non trouvé.";
    }
} else {
    echo "Identifiant de projet non spécifié.";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>5ademni Admin Panel</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet" />
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet" />
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet" />
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="p-1">
                            <div class="text-center">
                            </div>
                            <form id="myForm" action="#" method="post" onsubmit="return validateForm()">
                                <div class="box">
                                    <div class="container">
                                        <h2>Modifier projet</h2>
                                    </div>
                                    <div class="container">
                                        <label>Nom Projet </label>
                                        <input type="text" class="form-control form-control-user" name="nom_projet" value="<?php echo isset($projet['nom_projet']) ? $projet['nom_projet'] : ''; ?>" />
                                        <label>Nom Realisateur </label>
                                        <input type="text" class="form-control form-control-user" name="nom_realisateur" value="<?php echo isset($projet['nom_realisateur']) ? $projet['nom_realisateur'] : ''; ?>" />
                                        <label>Niveau d Etudes </label>
                                        <input type="text" class="form-control form-control-user" name="niveau_etudes" value="<?php echo isset($projet['niveau_etudes']) ? $projet['niveau_etudes'] : ''; ?>" />
                                        <label>Email</label>
                                        <input type="text" class="form-control form-control-user" name="email" value="<?php echo isset($projet['email']) ? $projet['email'] : ''; ?>" />
                                        <label>Time </label>
                                        <input type="int" class="form-control form-control-user" name="time" value="<?php echo isset($projet['time']) ? $projet['time'] : ''; ?>" />
                                        <label>Domaine </label>
                                        <input type="text" class="form-control form-control-user" name="domaine" value="<?php echo isset($projet['domaine']) ? $projet['domaine'] : ''; ?>" />
                                        <label>Budget </label>
                                        <input type="int" class="form-control form-control-user" name="budget" value="<?php echo isset($projet['budget']) ? $projet['budget'] : ''; ?>" />
                                        <label>Description </label>
                                        <input type="text" class="form-control form-control-user" name="description" value="<?php echo isset($projet['description']) ? $projet['description'] : ''; ?>" />
                                    </div>
                                    <div class="buttons">
                                        <input type="reset" class="button" value="Reset" />
                                        <input type="submit" class="button" value="submit" name="submit" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
