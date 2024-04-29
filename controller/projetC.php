<?php
include_once("C:/xampp/htdocs/Final/config.php");
include_once("C:/xampp/htdocs/Final/Model/projet.php");

class projetC
{
    function selectConn(){
        $sql="select * from projet";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
    }
    catch(Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }
}

    function afficherProjet(){
        $sql="select * from projet";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
    }
    catch(Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }
}

public function ajouterProjet($projet){
    if(empty($projet->getNomPr()) || empty($projet->getEmail()) || empty($projet->getTime()) || empty($projet->getDomaine()) || empty($projet->getDescription())) {
        echo "Tous les champs sont obligatoires.";
        return; 
    }
    if (!filter_var($projet->getEmail(), FILTER_VALIDATE_EMAIL)) {
        echo "L'adresse email n'est pas valide.";
        return;
    }

    if ($projet->getTime() > 15) {
        echo "Le champ 'time' ne doit pas dépasser 15.";
        return;
    }

    $sql="INSERT INTO projet(nompr,email,time,domaine,description) VALUES (:nompr,:email,:time,:domaine,:description)";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute([
        'nompr'=>$projet->getNomPr(),
        'email'=>$projet->getEmail(),
        'time'=>$projet->getTime(),
        'domaine'=>$projet->getDomaine(),
        'description'=>$projet->getDescription()
        ]);
        echo "Le projet a été ajouté avec succès.";
    }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
}

function modifierProjet($id,$projet) {
    $sql="UPDATE projet set nompr=:nompr,email=:email,time=:time,domaine=:domaine,description=:description where id=".$id."";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
    
        $query->execute([
            'nompr' => $projet->getNomPr(),
            'email' => $projet->getEmail(),
            'time' => $projet->getTime(),
            'domaine' => $projet->getDomaine(),
            'description' => $projet->getDescription()
        ]);			
    }
    catch (Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }		
  }

public function supprimerProjet($id)
{
    $sql = "DELETE FROM projet WHERE id=".$id."";
    $db = config::getConnexion();
    $query =$db->prepare($sql);
    
    try {
        $query->execute();
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());

    }
}
}
?>