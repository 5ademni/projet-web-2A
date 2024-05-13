<?php
 include_once '../../Controller/adminC.php';
 $co = new adminC();
 if(isset($_GET['id'])){
     $co->supprimerAdmin($_GET['id']);
 
    header('Location:affichageAdmin.php');
    }
 ?>