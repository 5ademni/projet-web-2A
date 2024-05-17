<?php
include_once '../../auth/config.php';
include '../../Model/formation.php';
include '../../Controller/formationC.php';
include_once "../../Controller/send_notification.php";

$formationC = new formationC();
$error = "";
$formation = null;

if (
    isset($_POST["titre"]) &&
    isset($_POST["duree"]) &&
    isset($_POST["description"]) &&
    isset($_POST["prix"])&&
    isset($_POST["ids"])&&
    isset($_FILES['image'])

) {
    if (
        !empty($_POST['titre']) &&
        !empty($_POST["duree"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["prix"])&&
        !empty($_FILES['image']['name'])

    ) {
        $original_name = $_FILES["image"]["name"];
        $new_name = uniqid() . time() . "." . pathinfo($original_name, PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["image"]["tmp_name"], "./images/" . $new_name);

        // Créer un nouvel objet Formation avec les données du formulaire
        $formation = new formation(
            null,
            $_POST["titre"],
            $_POST["duree"],
            $_POST["description"],
            $_POST["prix"],
            $_POST["ids"],
            $new_name

        );
        
        // Ajouter la formation à la base de données
        $formationC->addFormation($formation);





        function getUsers()
        {
            $db = config::getConnexion();
            $sql = "SELECT email, nom FROM admin";
            $stmt = $db->query($sql);
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $users;
        }
        
        // Fetch all users' emails and names
        $users = getUsers(); // Fetch users from the function
    
        // Send email to each user
        foreach ($users as $user) {
            $sendResult = sendNewFormationNotification(
                $_POST['titre'],
                $_POST['duree'],
                $_POST['description'],
                $_POST['prix'],
                $user['email'],
                $user['nom']
            );
        
            if ($sendResult === true) {
                echo "Notification sent successfully to " . $user['email'] . "<br>";
        
            } else {
                echo "Error sending notification to " . $user['email'] . ": " . $sendResult . "<br>";
            }
        }
        
        header('Location: Listformation.php');
        exit();
    } else {
        $error = "Missing information";
        
    }
}
