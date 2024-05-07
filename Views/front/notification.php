<?php
session_start(); // Démarrez la session

// Inclure le fichier contenant la classe postulationC
require_once("../../Controller/postulationC.php");

include_once '../../connexion.php';

// Connexion à la base de données
$connect = mysqli_connect('localhost', 'root', 'root', 'projet') or die('La connexion à la base de données a échoué');
// Créer une instance de la classe postulationC avec l'objet de connexion en argument
$postulationController = new postulationC($connect);


// Récupérer toutes les postulations depuis la base de données
$postulations = $postulationController->getAllPostulations(); // Assurez-vous d'implémenter cette méthode dans votre classe postulationC
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <!-- Mettez ici vos liens vers les fichiers CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }

        .notification-card {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s ease, opacity 0.3s ease;
            position: relative;
        }

        .notification-card h2 {
            font-size: 20px;
            color: #333;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .notification-card h2 i {
            margin-right: 10px;
            color: #0073b1;
        }

        .notification-card p {
            font-size: 16px;
            color: #666;
            margin-bottom: 0;
        }

        .notification-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            color: #999;
            transition: color 0.3s ease;
        }

        .close-button:hover {
            color: #333;
        }

        .no-notifications {
            text-align: center;
            color: #999;
            font-size: 18px;
        }
        /* Couleur orange pour le texte */
.orange-text {
    color: orange;
}

/* Couleur verte pour le texte */
.green-text {
    color: green;
}

/* Couleur rouge pour le texte */
.red-text {
    color: red;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Notifications</h1>
        <?php
// Vérifiez s'il y a des postulations
if (!empty($postulations)) {
    foreach ($postulations as $postulation) {
        $status = $postulationController->getStatus($postulation['id_post']);
        $statusClass = '';
        if ($status == 'en cours') {
            $statusClass = 'orange-text';
        } elseif ($status == 'accepté') {
            $statusClass = 'green-text';
        } elseif ($status == 'refusé') {
            $statusClass = 'red-text';
        }
        echo '<div class="notification-card">';
        echo '<span class="close-button">&times;</span>';
        echo '<h2><i class="fas fa-bell"></i> Vous avez postulé pour le projet : ' . $postulation['nom_projet'] . '</h2>';
        // Afficher le statut avec la classe CSS appropriée
        echo '<p>Status : <span class="' . $statusClass . '">' . $status . '</span></p>';
        // Personnaliser le message en fonction du statut
        if ($status == 'En cours') {
            echo '<p>Votre candidature pour ce projet est en cours de traitement. Nous vous tiendrons informé dès que possible.</p>';
        } elseif ($status == 'accepté') {
            echo '<p>Félicitations ! Votre candidature pour ce projet a été acceptée. Un responsable vous contactera sous peu pour discuter des prochaines étapes.</p>';
        } elseif ($status == 'refusé') {
            echo '<p>Nous regrettons de vous informer que votre candidature pour ce projet n\'a pas été retenue. Nous vous remercions de votre intérêt et vous encourageons à postuler à d\'autres projets.</p>';
        }
        echo '</div>';
    }
} else {
    // Si aucune postulation n'a été trouvée
    echo '<div class="no-notifications">';
    echo '<p>Aucune notification pour le moment.</p>';
    echo '</div>';
}
?>


    </div>

    <script>
        // Ajouter la fonctionnalité de fermeture aux cartes de notification
        document.querySelectorAll('.close-button').forEach(button => {
            button.addEventListener('click', () => {
                const notificationCard = button.parentElement;
                notificationCard.style.opacity = '0';
                setTimeout(() => {
                    notificationCard.style.display = 'none';
                }, 300);
            });
        });
    </script>
</body>
</html>
