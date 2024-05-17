<?php
include_once '../../auth/config.php';
include '../../Controller/specialiteC.php';

$specialiteC = new SpecialiteC();

if (isset($_GET['ids'])) {
    $id = $_GET['ids'];
    $specialiteC->deletespecialite($id);
    header("Location: Listspecialite.php"); // Replace "index.php" with the desired page URL
    exit();
}