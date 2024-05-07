<?php
// Vérifiez si les données nécessaires sont présentes dans la requête POST
if(isset($_POST['id_post'], $_POST['status'])) {
    // Récupérez les valeurs de la requête POST
    $id_post = $_POST['id_post'];
    $status = $_POST['status'];
    
    // Effectuez la mise à jour du statut dans la base de données
    // Par exemple, vous pouvez utiliser PDO pour se connecter à la base de données et exécuter la requête SQL correspondante.
    // Assurez-vous d'utiliser des requêtes préparées pour éviter les attaques par injection SQL.

    // Exemple d'utilisation de PDO pour la mise à jour du statut dans une table postulation
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=projet', 'root', 'root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparez la requête SQL avec un paramètre
        $stmt = $pdo->prepare("UPDATE postulation SET status = :status WHERE id_post = :id_post");

        // Liez les valeurs aux paramètres
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->bindParam(':id_post', $id_post, PDO::PARAM_INT);

        // Exécutez la requête
        $stmt->execute();

        // Réponse JSON pour indiquer le succès de la mise à jour
        echo json_encode(array("success" => true, "message" => "Statut mis à jour avec succès."));
    } catch(PDOException $e) {
        // En cas d'erreur, retournez une réponse JSON avec un message d'erreur
        echo json_encode(array("success" => false, "message" => "Erreur lors de la mise à jour du statut: " . $e->getMessage()));
    }
} else {
    // Si les données nécessaires ne sont pas présentes dans la requête POST, retournez une réponse JSON avec un message d'erreur
    echo json_encode(array("success" => false, "message" => "Données manquantes dans la requête POST."));
}
?>


