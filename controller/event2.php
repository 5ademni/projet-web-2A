<?php
include_once '../../auth/config.php';
include_once '../../model/event.php';

class EvenementC
{
    public function listEvenements()
    {
        $sql = "SELECT * FROM evenement";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function addEvenement(Evenement $evenement)
    {
        $sql = "INSERT INTO evenement (id_evenement,id_auteur, titre, contenu, dateEvenement, lieu, prix, nbPlaces, image,heureEvenement,id_categorie) VALUES (:id_evenement,:id_auteur, :titre, :contenu, :dateEvenement, :lieu, :prix, :nbPlaces, :image,:heureEvenement,:id_categorie)";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id_evenement', $evenement->getId_evenement());
            $stmt->bindValue(':id_auteur', $evenement->getId_auteur());
            $stmt->bindValue(':titre', $evenement->getTitre());
            $stmt->bindValue(':contenu', $evenement->getContenu());
            $stmt->bindValue(':dateEvenement', $evenement->getDateEvenement());
            $stmt->bindValue(':lieu', $evenement->getLieu());
            $stmt->bindValue(':prix', $evenement->getPrix());
            $stmt->bindValue(':nbPlaces', $evenement->getNbPlaces());
            $stmt->bindValue(':image', $evenement->getImage());
            $stmt->bindValue(':heureEvenement', $evenement->getHeureEvenement());
            $stmt->bindValue(':id_categorie', $evenement->getIdCategorie());

            $stmt->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    public function deleteEvenement($id)
    {
        $sql = "DELETE FROM evenement WHERE id_evenement = :id";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id);

            $stmt->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function listEvenement_edit($id)
    {
        $sql = "SELECT * FROM evenement WHERE id_evenement = :id";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function getevenementbyid($id) {
        // Préparez une requête SQL pour sélectionner l'événement par son ID
        $sql = "SELECT * FROM evenement WHERE id_evenement = :id";
    
        $db = config::getConnexion();
        try {
          $stmt = $db->prepare($sql);
          $stmt->execute([$id]);
          $event = $stmt->fetch();
          return $event;
        } catch (Exception $e) {
          die('Erreur: ' . $e->getMessage());
        }
    }
    
    public function updateEvenement($id, Evenement $evenement)
    {
        $sql = "UPDATE evenement SET id_auteur = :id_auteur, titre = :titre, contenu = :contenu, dateEvenement = :dateEvenement, lieu = :lieu, prix = :prix, nbPlaces = :nbPlaces, image = :image , heureEvenement = :heureEvenement WHERE id_evenement = :id";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':id_auteur', $evenement->getId_auteur());
            $stmt->bindValue(':titre', $evenement->getTitre());
            $stmt->bindValue(':contenu', $evenement->getContenu());
            $stmt->bindValue(':dateEvenement', $evenement->getDateEvenement());
            $stmt->bindValue(':lieu', $evenement->getLieu());
            $stmt->bindValue(':prix', $evenement->getPrix());
            $stmt->bindValue(':nbPlaces', $evenement->getNbPlaces());
            $stmt->bindValue(':image', $evenement->getImage());
            $stmt->bindValue(':heureEvenement', $evenement->getHeureEvenement());
            $stmt->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function getEvents()
 {
    $sql = "SELECT * FROM evenement";
    $db = config::getConnexion();
    try {
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}

public function getEvenement($id)
    {
        $sql = "SELECT * FROM evenement WHERE id_evenement = :id";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

public function existeid_auteur($id_auteur)
{
    $sql = "SELECT * FROM evenement WHERE id_auteur = :id_auteur";
    $db = config::getConnexion();
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id_auteur', $id_auteur);
        $stmt->execute();
        return $stmt->fetch();
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }

}
public function getEventsByCategory($id_categorie)
{
    $sql = "SELECT * FROM evenement WHERE id_categorie = :id_categorie";
    $db = config::getConnexion();
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id_categorie', $id_categorie);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}
}
?>