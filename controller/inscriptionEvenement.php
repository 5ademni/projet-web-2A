<?php
include_once '../../auth/config.php';
include_once '../../model/inscriptionEvenement2.php';
class inscriptionEC
{
    public function listInscription()
    {
        $sql = "SELECT * FROM inscription";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function addInscription($id_evenement,$id_admin) {
        $db = config::getConnexion();
    
        // Récupération des données de la session
    
    
        // Préparation de la requête SQL pour l'inscription
        $sql = "INSERT INTO inscriptionevenement (id_evenement, id_admin, date_inscription) VALUES (:id_evenement, :id_admin, :date_inscription)";
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id_evenement', $id_evenement);
            $stmt->bindValue(':id_admin', $id_admin);
            $stmt->bindValue(':date_inscription', date('Y-m-d H:i:s'));
    
            // Exécution de la requête SQL
            $stmt->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    
        // Préparation de la requête SQL pour mettre à jour le nombre de places
        $sql = "UPDATE evenement SET nbPlaces = nbPlaces - 1 WHERE id_evenement = :id_evenement";
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id_evenement', $id_evenement);
    
            // Exécution de la requête SQL
            $stmt->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function estInscrit( $id_evenement, $id_admin)
    { 
        $db = config::getConnexion();
        $sql = "SELECT * FROM inscriptionevenement WHERE id_admin = :id_admin AND id_evenement = :id_evenement";
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id_admin', $id_admin);
            $stmt->bindValue(':id_evenement', $id_evenement);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function deleteInscription($id)
    {
        $sql = "DELETE FROM inscription WHERE id_inscription = :id";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

}
?>