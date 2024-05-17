<?php
include_once '../../auth/config.php';
include '../../Model/specialite.php';
include '../../Controller/specialiteC.php';
$specialiteC = new SpecialiteC();

$error = "";
$specialite = null;

if (
    isset($_POST["noms"]) &&
    isset($_POST["descrips"])
) {
    if (
        !empty($_POST['noms']) &&
        !empty($_POST["descrips"])
    ) {
        $specialite = new Specialite(
            null,
            $_POST["noms"],
            $_POST["descrips"]
        );
        
        // Ajouter la spécialité à la base de données
        $specialiteC->addSpecialite($specialite);
        
        header('Location: Listspecialite.php');
        exit();
    } else {
        $error = "Missing information";
                echo "<script>var errorMessage = '" . $error . "';</script>";

    }
}
