<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sélectionner un domaine</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        p {
            font-size: 16px;
            margin-bottom: 10px;
        }
        .domaine-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .domaine-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 18px;
            transition: all 0.3s ease;
        }
        .domaine-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Trouvez le projet selon le domaine</h1>
        <p>Domaines disponibles :</p>
        <div class="domaine-container">
            <!-- Affichage des boutons pour chaque domaine -->
            <?php
            include_once '../../Controller/projetC.php';
            $c = new projetC();
            $domaines = $c->getDomaines(); // Récupérer tous les domaines disponibles
            foreach ($domaines as $domaine) {
                echo '<a href="developpement.php?domaine=' . urlencode($domaine) . '" class="domaine-button">' . $domaine . '</a>';
            }
            ?>
        </div>
    </div>
</body>
</html>