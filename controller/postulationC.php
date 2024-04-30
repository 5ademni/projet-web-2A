<?php
include_once("C:/xampp/htdocs/projet/config.php");
include_once '../../Model/postulation.php';
require_once('C:/Users/Dorra Sioud/Downloads/TCPDF-main/TCPDF-main/tcpdf.php');

class postulationC
{


    
    function selectConn(){
        $sql = "SELECT * FROM postulation";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch(Exception $e) {
            echo 'Erreur: '.$e->getMessage();
        }
    }

    public function afficherPostulationDetail(int $rech1)
    {
        $sql = "SELECT * FROM postulation WHERE id_post=:id_post";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(array('id_post' => $rech1));
            $liste = $query->fetch();
            return $liste;
        } catch(Exception $e) {
            die('Erreur: '.$e->getMessage());
        }
    }

    function afficherPostulation(){
        $sql = "SELECT * FROM postulation";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch(Exception $e) {
            echo 'Erreur: '.$e->getMessage();
        }
    }
    function ajouterPostulation($postulation){
        $sql = "INSERT INTO postulation(participer, disponibilite_horaire, details) VALUES (:participer, :disponibilite_horaire, :details)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'participer' => $postulation->getParticiper(),
                'disponibilite_horaire' => $postulation->getDisponibileHoraire(), // Updated method name
                'details' => $postulation->getDetails()
            ]);
            echo "Le participant a été ajouté avec succès.";
        } catch(Exception $e) {
            echo 'Erreur: '.$e->getMessage();
        }
    }
    function modifierPostulation($id_post, $postulation) {
        $sql = "UPDATE postulation SET participer=:participer, disponibilite_horaire=:disponibilite_horaire, details=:details WHERE id_post=:id_post";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $result = $query->execute([
                'participer' => $postulation->getParticiper(),
                'disponibilite_horaire' => $postulation->getDisponibileHoraire(), // Corrected method name
                'details' => $postulation->getDetails(),
                'id_post' => $id_post
            ]);
            if ($result) {
                echo "Postulation details updated successfully.";
            } else {
                echo "Error updating postulation details.";
            }
        } catch (Exception $e) {
            echo 'Erreur: '.$e->getMessage();
        }
    }
    
    public function supprimerPostulation($id_post)
    {
        $sql = "DELETE FROM postulation WHERE id_post=:id_post";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id_post' => $id_post]);
        } catch(Exception $e) {
            die('Erreur: '.$e->getMessage());
        }
    }
    public function afficherPostulationRech(string $rech1, string $selon)
    {
        $sql = "select * from postulation where $selon like '" . $rech1 . "%'";

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function afficherPostulationTrie(string $selon)
    {
        $colonnesValides = array('participer', 'disponibilite_horaire', 'details');
        if (!in_array($selon, $colonnesValides)) {
            echo "La colonne spécifiée n'est pas valide.";
            return null;
        }
        $sql = "SELECT * FROM postulation order by " . $selon . "";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
            return null;
        }
    }
}
?>
