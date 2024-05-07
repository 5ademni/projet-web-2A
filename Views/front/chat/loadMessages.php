<?php
// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', 'root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Active le mode d'erreur PDO exception
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

// Récupération des messages, en les triant par ordre décroissant d'identifiant pour obtenir les plus récents en premier
$recupMessage = $bdd->query('SELECT * FROM messages ORDER BY id DESC');

// Affichage des messages
while ($message = $recupMessage->fetch()) {
    // Conversion des émojis spécifiques dans le message
    $convertedMessage = str_replace(':)', '😊', $message['message']);
    $convertedMessage = str_replace('<3', '❤️', $convertedMessage);
    $convertedMessage = str_replace('</', '👍', $convertedMessage);
    ?>
    <div class="message">
    <h4><?= $message['pseudo']; ?></h4>
    <p><?= $convertedMessage; ?></p>
    <p><?= date('d/m/Y H:i', strtotime($message['timestamp'])); ?></p> <!-- Cette ligne affiche la date et l'heure formatées -->
</div>
    <?php
}
?>

