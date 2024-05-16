<?php
// Start output buffering
ob_start();

// Require projetC.php file
include_once '../../Controller/projetC.php';

// Check if project ID is provided
if(isset($_POST['id'])) {
    $id = $_POST['id'];

    // Instantiate projetC class
    $projetC = new projetC();

    // Generate PDF for the specified project ID
    $projetC->generateProjectPDF($id);

    // Clean (erase) the output buffer
    ob_end_clean();

} else {
    echo "Project ID not provided.";
}
?>
