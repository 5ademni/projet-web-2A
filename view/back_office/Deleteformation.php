<?php
include_once '../../auth/config.php';
include '../../Controller/formationC.php';

$formationC = new formationC();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $formationC->deleteFormation($id);
    header("Location: Listformation.php"); // Replace "index.php" with the desired page URL
    exit();
}