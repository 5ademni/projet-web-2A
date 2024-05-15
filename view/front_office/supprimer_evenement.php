<?php
include_once '../../controller/event2.php';

// Créer une instance du contrôleur
$controller = new EvenementC();

// Assurez-vous d'appeler la fonction deleteEvenement pour supprimer l'événement
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $event_id = $_GET['id'];
    try {
        $controller->deleteEvenement($event_id);
        echo "L'événement a été supprimé avec succès.";
    } catch (Exception $e) {
        echo 'Erreur: ' . $e->getMessage();
    }
    header('Location: trouver_evenement.php');
    exit;
}
?>
