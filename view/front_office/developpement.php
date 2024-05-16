<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projets pour le domaine sélectionné</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 25px 35px;
            background-color: #fff;
            border-radius: 40px;
            box-shadow: 0px 30px 30px -20px rgba(133, 189, 215, 0.878);
            border: 5px solid #fff;
        }
        .heading {
            text-align: center;
            font-weight: 900;
            font-size: 30px;
            color: green;
            margin-bottom: 30px;
        }
        .text-before-table {
            text-align: center;
            font-size: 20px;
            color: #333;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .login-button {
            display: block;
            width: 100%;
            font-weight: bold;
            background-color: #1089d3;
            color: #fff;
            padding: 15px;
            margin: 20px auto;
            border-radius: 20px;
            box-shadow: 0px 20px 10px -15px rgba(133, 189, 215, 0.878);
            border: none;
            transition: all 0.2s ease-in-out;
            text-decoration: none;
            text-align: center;
        }
        .login-button:hover {
            transform: scale(1.03);
            box-shadow: 0px 23px 10px -20px rgba(133, 189, 215, 0.878);
        }
        .login-button:active {
            transform: scale(0.95);
            box-shadow: 0px 15px 10px -10px rgba(133, 189, 215, 0.878);
        }
        .btn-delete {
            display: inline-block;
            padding: 8px 16px;
            background-color: #e74c3c;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        .btn-edit {
            display: inline-block;
            padding: 8px 16px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        .btn-delete:hover, .btn-edit:hover {
            background-color: #c0392b;
        }

        .btn-delete:active, .btn-edit:active {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="heading">Projets pour le domaine sélectionné</h1>
        <?php 
        if (isset($_GET['domaine'])) {
            include_once '../../Controller/projetC.php';
            $c = new projetC();
            $domaine = urldecode($_GET['domaine']);
            $tab = $c->afficherDomaine($domaine);
            if (!empty($tab)) {
                echo '<table>';
                echo '<tr>';
                echo '<th>Nom du projet</th>';
                echo '<th>Nom du réalisateur</th>';
                echo '<th>Niveau d\'études</th>';
                echo '<th>Email</th>';
                echo '<th>Durée</th>';
                echo '<th>Domaine</th>';
                echo '<th>Budget</th>';
                echo '<th>Description</th>';
                echo '<th>Actions</th>';
                echo '</tr>';
                foreach ($tab as $projet) {
                    echo '<tr>';
                    echo '<td>' . $projet['nom_projet'] . '</td>';
                    echo '<td>' . $projet['nom_realisateur'] . '</td>';
                    echo '<td>' . $projet['niveau_etudes'] . '</td>'; 
                    echo '<td>' . $projet['email'] . '</td>';
                    echo '<td>' . $projet['time']. '</td>';
                    echo '<td>' . $projet['domaine'] . '</td>';
                    echo '<td>' . $projet['budget'] . '</td>';
                    echo '<td>' . $projet['description'] . '</td>';
                    echo '<td>';
                    echo '<a href="supprimerProjet.php?id=' . $projet['id'] . '" class="btn-delete">Supprimer</a>';
                    echo '<a href="modifierProjet.php?id=' . $projet['id'] . '" class="btn-edit">Modifier</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo '<p>Aucun projet trouvé pour ce domaine.</p>';
            }
        } else {
            echo '<p>Aucun domaine sélectionné.</p>';
        }
        ?>
    </div>
</body>
</html>