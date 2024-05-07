<?php
 include_once '../../Controller/postulationC.php';
 $co = new postulationC($connect);
 if(isset($_GET['id_post'])){
     $co->supprimerPostulation($_GET['id_post']);
 
    header('Location:affichagePostulation.php');
    }

 ?>