<?php
// Inclure le contrôleur et le modèle de la postulation
include_once("../../Model/postulation.php");
include_once("../../Controller/postulationC.php");
include_once '../../auth/connexion.php';

// Connexion à la base de données avec PDO
try {
    $pdo = new PDO('mysql:host=localhost;dbname=5ademni', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // En cas d'erreur de connexion, afficher un message d'erreur et arrêter l'exécution du script
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

// Vérifiez si l'ID de la postulation est passé en paramètre GET
if (isset($_GET['id_post'])) {

    // Récupérer les données de la postulation à modifier
    $postulationC = new postulationC($pdo);
    $postulation = $postulationC->afficherPostulationDetail($_GET['id_post']);

    // Vérifiez si la postulation existe
    if ($postulation) {
        // Traitement des données soumises pour la modification de la postulation
        if (isset($_POST['submit'])) {
            // Récupération des données du formulaire
            $participer = $_POST['participer'];
            $nom_societe = isset($_POST['nom_societe']) ? $_POST['nom_societe'] : ""; // Vérifier si le champ nom_societe est défini
            $disponibilite_horaire = $_POST['disponibilite_horaire'];
            $details = $_POST['details'];

            // Vérifier si la clé "status" existe dans le tableau $postulation
            $status = isset($postulation['status']) ? $postulation['status'] : "";

            // Création de l'objet postulation
            $postulation = new postulation($participer, $nom_societe, $disponibilite_horaire, $details, (int)$_GET['id_post'], $status);

            // Modification de la postulation dans la base de données
            $postulationC->modifierPostulation($_GET['id_post'], $postulation);

            // Redirection vers une autre page après la modification
            header('Location: affichagePostulation.php');
            exit;
        }
    } else {
        // La postulation avec l'ID spécifié n'existe pas, vous pouvez gérer cela en affichant un message d'erreur ou en redirigeant l'utilisateur
        echo "La postulation avec l'ID spécifié n'existe pas.";
        exit;
    }
} else {
    // L'ID de la postulation n'est pas spécifié, vous pouvez gérer cela en affichant un message d'erreur ou en redirigeant l'utilisateur
    echo "ID de postulation non spécifié.";
    exit;
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
                    <div class="C:\xampp\htdocs\Final\Views\backend\modif.gif"></div>
                    <div class="col-lg-7">
                        <div class="p-1">
                            <div class="text-center">
                            </div>
                            <!-- Formulaire de modification de la postulation -->
                            <form id="myForm" action="#" method="post" onsubmit="return validateForm()">
                                <!-- Box -->
                                <div class="box">
                                    <!-- Box Head -->
                                    <div class="container">
                                        <h2>Modifier postulation</h2>
                                    </div>
                                    <!-- End Box Head -->
                                    <!-- Form -->
                                    <div class="container">
                                        <label for="participer">Avez-vous participé à un projet freelance auparavant ? :</label>
                                        <input type="radio" id="participer_oui" name="participer" value="oui" <?php if ($postulation['participer'] == 'oui') echo 'checked'; ?> onclick="toggleSocieteField(true)">
                                        <label for="participer_oui">Oui</label>
                                        <input type="radio" id="participer_non" name="participer" value="non" <?php if ($postulation['participer'] == 'non') echo 'checked'; ?> onclick="toggleSocieteField(false)">
                                        <label for="participer_non">Non</label>
                                        <br />
                                        <div id="societeField" <?php if ($postulation['participer'] != 'oui') echo 'style="display: none;"'; ?>>
                                            <label for="nom_societe">Nom de la société :</label>
                                            <input type="text" id="nom_societe" name="nom_societe" value="<?php echo $postulation['nom_societe']; ?>" />
                                        </div>
                                        <br />
                                        <label for="disponibilite_horaire">Disponibilité Horaire :</label>
                                        <select id="disponibilite_horaire" name="disponibilite_horaire">
                                            <option value="matin" <?php if ($postulation['disponibilite_horaire'] == 'matin') echo 'selected'; ?>>Matin</option>
                                            <option value="soir" <?php if ($postulation['disponibilite_horaire'] == 'soir') echo 'selected'; ?>>Soir</option>
                                        </select>
                                        <br />
                                        <label for="details">Détails :</label>
                                        <textarea id="details" name="details"><?php echo $postulation['details']; ?></textarea>
                                        <br />
                                    </div>
                                    <!-- End Form -->
                                    <!-- Form Buttons -->
                                    <div class="buttons">
                                        <input type="reset" class="button" value="Reset" />
                                        <input type="submit" name="submit" class="button" value="Submit" />
                                    </div>
                                    <!-- End Form Buttons -->
                                </div>
                                <!-- End Box -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script pour basculer la visibilité du champ de nom de société et effacer son contenu -->
    <script>
        function toggleSocieteField(show) {
            var societeField = document.getElementById('societeField');
            societeField.style.display = show ? 'block' : 'none';
            if (!show) {
                // Effacer le contenu du champ de nom de société lorsque celui-ci est masqué
                document.getElementById('nom_societe').value = '';
            }
        }
    </script>
</body>

</html>