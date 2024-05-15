<?php
include_once '../../Controller/adminC.php';

$co = new adminC();
if (isset($_GET['id'])) {
    $adminC = new adminC();
    $listeC = $adminC->afficherAdminDetail($_GET['id']);

    foreach ($listeC as $admin) {
?>



<style>

</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>5ademni Admin Panel - Modifier Projet</title>
    <!-- Bootstrap CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f8f9fc;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            border-radius: 10px 10px 0 0;
            color: #fff;
            text-align: center;
            font-weight: bold;
            padding: 20px;
        }
        .card-body {
            padding: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-control {
            border-radius: 20px;
        }
        .btn-primary {
            border-radius: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Modifier Projet
                    </div>
                    <div class="card-body">
                        <form action="#" method="post">
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $admin['nom']; ?>" placeholder="Nom" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $admin['email']; ?>" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label for="adresse">Adresse</label>
                                <input type="text" class="form-control" id="adresse" name="adresse" value="<?php echo $admin['adresse']; ?>" placeholder="Adresse" required>
                            </div>
                            <div class="form-group">
                                <label for="numtel">Numéro de téléphone</label>
                                <input type="tel" class="form-control" id="numtel" name="numtel" value="<?php echo $admin['numtel']; ?>" placeholder="Numéro de téléphone" required>
                            </div>
                            <div class="form-group">
                                <label for="mdp">Mot de passe</label>
                                <input type="password" class="form-control" id="mdp" name="mdp" value="<?php echo $admin['mdp']; ?>" placeholder="Mot de passe" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Enregistrer Modification</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


    <?php
    }
}

// create event
$admin = null;


$adminC = new adminC();
if (
    isset($_POST["nom"]) && 
    isset($_POST["email"]) &&
    isset($_POST["adresse"]) &&
    isset($_POST["numtel"]) &&
    isset($_POST["mdp"])
) {
    if (
        !empty($_POST["nom"]) && 
        !empty($_POST["email"]) &&
        !empty($_POST["adresse"]) &&
        !empty($_POST["numtel"]) &&
        !empty($_POST["mdp"]) 
    ) {if ($_POST['nom'] !== strtoupper($_POST['nom'])) {
     $error = "Le nom doit être en majuscules.";
 } else {
    
     if (!preg_match('/^[0-9]{8}$/', $_POST['numtel'])) {
         $error = "Le numéro de téléphone doit contenir exactement 8 chiffres.";
     } else {
       
         if (!preg_match('/[0-9]+/', $_POST['mdp']) || !preg_match('/[a-zA-Z]+/', $_POST['mdp']) || !preg_match('/\W+/', $_POST['mdp'])) {
             $error = "Le mot de passe doit contenir au moins un chiffre, un symbole et une lettre.";
         } else{
        $admin = new admin(
            $_POST['nom'],
            $_POST['email'],
            $_POST['adresse'],
            $_POST['numtel'],
            $_POST['mdp']
        );
       $adminC->modifierAdmin($_GET['id'],$admin);
        
        header('Location:affichageAdmin.php');
       }
    }
   }
 }
    else
        $error = "Missing information";
}



?>

<?php if (!empty($error)) : ?>
           <div class="alert alert-danger"><?php echo $error; ?></div>
           <?php endif; ?>
