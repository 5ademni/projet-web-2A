<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projets pour le domaine sélectionné</title>
    <style>
        body {
            background: -webkit-linear-gradient(left, #0072ff, #00c6ff);
        }
        .container {
            max-width: 800px;
            background: #e8e8e8;
            background: linear-gradient(0deg, rgb(255, 255, 255) 0%, rgb(244, 247, 251) 100%);
            border-radius: 40px;
            padding: 25px 35px;
            border: 5px solid rgb(255, 255, 255);
            box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 30px 30px -20px;
            margin: 50px auto;
        }
        .heading {
            text-align: center;
            font-weight: 900;
            font-size: 30px;
            color: rgb(16, 137, 211);
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
            background: linear-gradient(45deg, rgb(16, 137, 211) 0%, rgb(18, 177, 209) 100%);
            color: white;
            padding: 15px;
            margin: 20px auto;
            border-radius: 20px;
            box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 20px 10px -15px;
            border: none;
            transition: all 0.2s ease-in-out;
            text-decoration: none;
            text-align: center;
        }
        .login-button:hover {
            transform: scale(1.03);
            box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 23px 10px -20px;
        }
        .login-button:active {
            transform: scale(0.95);
            box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 15px 10px -10px;
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
                echo '<table border="1">';
                echo '<tr>';
                echo '<th>Nom du projet</th>';
                echo '<th>Nom du realisateur</th>';
                echo '<th>Niveau Etudes</th>';
                echo '<th>Email</th>';
                echo '<th>Durée</th>';
                echo '<th>Domaine</th>';
                echo '<th>Budget</th>';
                echo '<th>Description</th>';
                echo '</tr>';
                foreach ($tab as $projet) {
                    echo '<tr>';
                    echo '<td>' . $projet['nom_projet'] . '</td>';
                    echo '<td>' . $projet['nom_realisateur'] . '</td>';
                    echo '<td>' . $projet['niveau_etudes'] . '</td>'; 
                    echo '<td>' . $projet['email'] . '</td>';
                    echo '<td>' . $projet['time'] . '</td>';
                    echo '<td>' . $projet['domaine'] . '</td>';
                    echo '<td>' . $projet['budget'] . '</td>';
                    echo '<td>' . $projet['description'] . '</td>';
                    echo '<td>';
                    echo '<a href="supprimerProjet.php?id=' . $projet['id'] . '" class="ico del">Delete</a>';
                    echo '<a href="modifierProjet.php?id=' . $projet['id'] . '" class="ico edit">Edit</a>';
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
