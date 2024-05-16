<?php
 include_once '../../Controller/projetC.php';
 $co = new projetC();
 if(isset($_GET['id'])){
     $co->supprimerProjet($_GET['id']);
 
    header('Location:affichageProjet.php');
    }

 ?>