<?php
include_once("C:/xampp/htdocs/projet/config.php");
include_once '../../Model/postulation.php';
require_once('C:/Users/Dorra Sioud/Downloads/TCPDF-main/TCPDF-main/tcpdf.php');

class postulationC
{
    private $connect;
    // Constructeur prenant la connexion à la base de données en paramètre
    public function __construct($connect) {
        $this->connect = $connect;
    }

    public function getStatus($postulation_id) {
        // Assurez-vous que $this->connect est défini
        if (!$this->connect) {
            // Gérer l'erreur de connexion manquante
            return "Erreur de connexion à la base de données";
        }
    
        // Préparez et exécutez votre requête SQL pour récupérer le statut de la postulation
        $query = "SELECT status FROM postulation WHERE id_post = ?";
        $stmt = $this->connect->prepare($query);
        $stmt->bind_param("i", $postulation_id); // "i" pour un entier, "s" pour une chaîne
        $stmt->execute();
        $stmt->bind_result($status);
        $stmt->fetch();
    
        // Retournez le statut
        return $status;
    }
    
    public function updatePostulationStatus($id_post, $new_status) {
        // Préparez la requête SQL pour mettre à jour le statut
        $sql = "UPDATE postulation SET status = :new_status WHERE id_post = :id_post";
    
        // Préparez la requête
        $stmt = $this->db->prepare($sql);
    
        // Liaison des paramètres
        $stmt->bindParam(':new_status', $new_status);
        $stmt->bindParam(':id_post', $id_post);
    
        // Exécutez la requête
        $stmt->execute();
    }
    
    public function getAllPostulations() {
        $sql = "SELECT postulation.*, projet.nom_projet 
                FROM postulation 
                JOIN projet ON postulation.id_p = projet.id";
        $db = config::getConnexion(); // Assurez-vous que config::getConnexion() est correctement implémenté
        try {
            $result = $db->query($sql);
            return $result->fetchAll(); // Retourne toutes les lignes de résultat sous forme de tableau
        } catch(Exception $e) {
            echo 'Erreur: '.$e->getMessage();
            return array(); // Retourne un tableau vide en cas d'erreur
        }
    }


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

    function afficherStatus(){
        $sql = "SELECT status FROM postulation"; // Remplacez * par le nom de l'attribut que vous voulez afficher
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
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
        $sql = "INSERT INTO postulation(participer,nom_societe, disponibilite_horaire, details, id_p) VALUES (:participer,:nom_societe, :disponibilite_horaire, :details, :id_p)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'participer' => $postulation->getParticiper(),
                'nom_societe' => $postulation->getNomSociete(),
                'disponibilite_horaire' => $postulation->getDisponibileHoraire(), // Updated method name
                'details' => $postulation->getDetails(),
                'id_p' => $postulation->getIdP()
            ]);
            echo "Le participant a été ajouté avec succès.";
        } catch(Exception $e) {
            echo 'Erreur: '.$e->getMessage();
        }
    }
    function modifierPostulation($id_post, $postulation) {
        $sql = "UPDATE postulation SET participer=:participer, nom_societe=:nom_societe, disponibilite_horaire=:disponibilite_horaire, details=:details WHERE id_post=:id_post";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $result = $query->execute([
                'participer' => $postulation->getParticiper(),
                'nom_societe' => $postulation->getNomSociete(),
                'disponibilite_horaire' => $postulation->getDisponibileHoraire(), // Corrected method name
                'details' => $postulation->getDetails(),
                'id_post' => $id_post,
                
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
