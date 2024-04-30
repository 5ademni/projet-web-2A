<?php
include_once '../../Model/postulation.php';
include_once '../../Controller/postulationC.php';

$postulationC = new postulationC();

if(isset($_GET['id_post'])){
    $postulationC = new postulationC();
    $postulation = $postulationC->afficherPostulationDetail($_GET['id_post']);
    
    if ($postulation && is_array($postulation)) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (
                isset($_POST["participer"]) && 
                isset($_POST["disponibilte_horaire"]) &&  
                isset($_POST["details"])
            ) {
                $modifiedPostulation = new postulation(
                    $_POST['participer'],
                    $_POST['disponibilte_horaire'],
                    $_POST['details']
                );

                // Debugging statement to check the modified postulation object
                var_dump($modifiedPostulation);

                $postulationC->modifierPostulation($_GET['id_post'], $modifiedPostulation);
                
                // Debugging statement to check if the modifierPostulation method is called
                echo "modifierPostulation method called.";
                
                header('Location: affichagePostulation.php');
                exit;
            } else {
                echo "All fields are required.";
            }
        }
        
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8" />
            <meta content="width=device-width, initial-scale=1.0" name="viewport" />
            <title>5ademni Admin Panel</title>
            <!-- Add your CSS links here -->
        </head>
        <body class="bg-gradient-primary">
            <div class="container">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="p-1">
                                    <div class="text-center"></div>
                                    <form action="#" method="post">
                                        <div class="container">
                                            <h2>Modifier projet</h2>
                                        </div>
                                        <div class="container">
                                            <!-- Ensure $postulation is an array before accessing its elements -->
                                            <p>
                                                <label>Nom</label>
                                                <input type="text" class="form-control form-control-user"
                                                    name="participer" value="<?php echo isset($postulation['participer']) ? $postulation['participer'] : ''; ?>" />
                                            </p>
                                            <p>
                                                <label>disponibilte_horaire</label>
                                                <input type="text" class="form-control form-control-user"
                                                    name="disponibilte_horaire"
                                                    value="<?php echo isset($postulation['disponibilte_horaire']) ? $postulation['disponibilte_horaire'] : ''; ?>" />
                                            </p>
                                            <p>
                                                <label>Détails</label>
                                                <input type="text" class="form-control form-control-user" name="details"
                                                    value="<?php echo isset($postulation['details']) ? $postulation['details'] : ''; ?>" />
                                            </p>
                                        </div>
                                        <div class="buttons">
                                            <input type="reset" class="button" value="Reset" />
                                            <input type="submit" class="button" value="Submit" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "Postulation details not found or invalid.";
    }
} else {
    echo "id_post is not set.";
}
?>
