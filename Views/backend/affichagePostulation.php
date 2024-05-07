<?php
include_once '../../Model/postulation.php';
include_once '../../Controller/postulationC.php';

$postulationC = new postulationC($connect);


// Fetch list of postulations
$listeC = $postulationC->afficherPostulation();

// Add a postulation
if (isset($_POST["participer"], $_POST["nom_societe"], $_POST["disponibilte_horaire"], $_POST["details"])) {
    $participer = $_POST["participer"];
    $nom_societe = $_POST["nom_societe"];
    $disponibilte_horaire = $_POST["disponibilte_horaire"];
    $details = $_POST["details"];

    if (!empty($participer) && !empty($nom_societe) && !empty($disponibilte_horaire) && !empty($details)) {
        $postulation = new postulation($participer, $nom_societe, $disponibilte_horaire, $details);
        $postulationC->ajouterPostulation($postulation);
        header('Location: affichagePostulation.php');
        exit;
    } else {
        $error = "Missing information";
    }
}

if (isset($_POST["rech"], $_POST["search"]) && !empty($_POST["rech"])) {
    $rech = $_POST["rech"];
    $selon = $_POST["selon"];
    $listeC = $postulationC->afficherPostulationRech($rech, $selon);
}

if (isset($_POST["tri"]) && !empty($_POST["tri"])) {
    $tri = $_POST["tri"];
    $listeC = $postulationC->afficherPostulationTrie($tri);
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

        .card-body {
            margin-bottom: 20px;
        }

        .table {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .table table {
            width: 100%;
            border-collapse: collapse;
        }

        .table table th,
        .table table td {
            padding: 10px;
            border-bottom: 1px solid #e0e0e0;
        }

        .table table th {
            background-color: #f5f5f5;
            font-weight: bold;
            text-align: left;
        }

        .table table tbody tr:hover {
            background-color: #f9f9f9;
        }

        .sort {
            margin-top: 20px;
            padding: 10px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .sort form {
            display: flex;
            align-items: center;
        }

        .sort label {
            margin-right: 10px;
        }

        .sort select {
            margin-right: 10px;
        }

        .button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header class="header fixed-top d-flex align-items-center">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="#" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="Logo">
                <span class="d-none d-lg-block">5ademni-Admin</span>
            </a>
            <button class="bi bi-list toggle-sidebar-btn"></button>
        </div>
    </header>

    <div class="wrapper">
        <!-- Page Content -->
        <div class="content-wrapper">
            <!-- Page Header -->
            <div class="page-header">
                <h1 class="m-0 font-weight-bold text-primary">Affichage Postulation</h1>
            </div>

            <!-- Search Form -->
            <div class="card-body">
                <form method="POST" action="affichagePostulation.php" class="d-flex align-items-center">
                    <input type="submit" value="Reset" class="button mr-2">
                    <input type="submit" value="Voir en détails" name="det" class="button mr-2">
                    <label for="rech" class="mr-2">Search accounts</label>
                    <input type="text" class="form-control mr-2" name="rech" id="rech">
                    <select name="selon" class="form-control mr-2">
                        <option value="participer">Participation</option>
                        <option value="disponibilte_horaire">Disponibilite_Horaire</option>
                    </select>
                    <input type="submit" class="button" value="Search" name="search">
                </form>
            </div>
            <!-- End Search Form -->

            <!-- Postulation Table -->
            <div class="table">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>id_post</th>
                            <th>Participer</th>
                            <th>Nom Societe</th>
                            <th>Disponibilite Horaire</th>
                            <th>Details</th>
                            <th>Status</th> <!-- Nouvelle colonne pour le menu déroulant -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if (!is_null($listeC) && (is_array($listeC) || is_object($listeC))) {
                            foreach($listeC as $postulation): ?>
                                <tr>
                                    <td><?php echo $postulation['id_post']; ?></td>
                                    <td><?php echo $postulation['participer']; ?></td>
                                    <td><?php echo $postulation['nom_societe']; ?></td>
                                    <td><?php echo $postulation['disponibilite_horaire']; ?></td>
                                    <td><?php echo $postulation['details']; ?></td>
                                    <td>
                                        <select class="status-select" data-postulation-id="<?php echo $postulation['id_post']; ?>">
                                            <option value="en_cours" <?php echo ($postulation['status'] == 'en_cours') ? 'selected' : ''; ?>>En cours</option>
                                            <option value="accepté" <?php echo ($postulation['status'] == 'accepté') ? 'selected' : ''; ?>>Accepté</option>
                                            <option value="refusé" <?php echo ($postulation['status'] == 'refusé') ? 'selected' : ''; ?>>Refusé</option>
                                        </select>
                                    </td>
                                    <td><a href="supprimerPostulation.php?id_post=<?php echo $postulation['id_post']; ?>" class="btn btn-primary" style="background-color: red;">Delete</a></td>
                                    <td><a href="modifierPostulation.php?id_post=<?php echo $postulation['id_post']; ?>" class="btn btn-primary" style="background-color: green;">Edit</a></td>
                                </tr>
                        <?php endforeach; 
                        } else {
                            echo "<tr><td colspan='6'>No data available</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- End Postulation Table -->

            <!-- Sorting Form -->
            <div class="sort">
                <form method="POST" class="d-flex align-items-center">
                    <label for="tri" class="mr-2">Sort by</label>
                    <select name="tri" class="form-control mr-2">
                        <option value="participer">Participation</option>
                        <option value="nom_societe">Disponibilite_Horaire</option>
                        <option value="disponibilite_horaire">Disponibilite_Horaire</option>
                    </select>
                    <input type="submit" value="Trier" class="button">
                </form>
            </div>
            <!-- End Sorting Form -->
        </div>
        <!-- End Page Content -->
    </div>

    <!-- Bootstrap core JavaScript and other scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/num-orders.js"></script>

    <!-- JavaScript for handling status updates -->
    <script>
        $(document).ready(function() {
            // When the selection in the dropdown changes
            $('.status-select').change(function() {
                // Get the ID of the associated postulation
                var postulationId = $(this).data('postulation-id');
                // Get the newly selected status
                var newStatus = $(this).val();

                // Send an AJAX request to update the status in the database
                $.ajax({
                    url: 'updateStatus.php', // PHP script to update the status
                    method: 'POST',
                    data: { id_post: postulationId, status: newStatus },
                    success: function(response) {
                        // Display a success message or perform any other necessary action
                        console.log('Status updated successfully');
                    },
                    error: function(xhr, status, error) {
                        // Handle AJAX request errors
                        console.error('Error updating status: ' + error);
                    }
                });
            });
        });
    </script>
</body>
</html>
