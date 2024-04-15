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
        $sql = "INSERT INTO evenement (id_evenement,id_auteur, titre, contenu, dateEvenement, heureEvenement, lieu, prix, nbPlaces, image) VALUES (:id_evenement,:id_auteur, :titre, :contenu, :dateEvenement, :heureEvenement, :lieu, :prix, :nbPlaces, :image)";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id_evenement', $evenement->getId_evenement());
            $stmt->bindValue(':id_auteur', $evenement->getId_auteur());
            $stmt->bindValue(':titre', $evenement->getTitre());
            $stmt->bindValue(':contenu', $evenement->getContenu());
            $stmt->bindValue(':dateEvenement', $evenement->getDateEvenement());
            $stmt->bindValue(':heureEvenement', $evenement->getHeureEvenement());
            $stmt->bindValue(':lieu', $evenement->getLieu());
            $stmt->bindValue(':prix', $evenement->getPrix());
            $stmt->bindValue(':nbPlaces', $evenement->getNbPlaces());
            $stmt->bindValue(':image', $evenement->getImage());
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

    public function updateEvenement($id, Evenement $evenement)
    {
        $sql = "UPDATE evenement SET id_auteur = :id_auteur, titre = :titre, contenu = :contenu, dateEvenement = :dateEvenement, heureEvenement = :heureEvenement, lieu = :lieu, prix = :prix, nbPlaces = :nbPlaces, image = :image WHERE id_evenement = :id";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':id_auteur', $evenement->getId_auteur());
            $stmt->bindValue(':titre', $evenement->getTitre());
            $stmt->bindValue(':contenu', $evenement->getContenu());
            $stmt->bindValue(':dateEvenement', $evenement->getDateEvenement());
            $stmt->bindValue(':heureEvenement', $evenement->getHeureEvenement());
            $stmt->bindValue(':lieu', $evenement->getLieu());
            $stmt->bindValue(':prix', $evenement->getPrix());
            $stmt->bindValue(':nbPlaces', $evenement->getNbPlaces());
            $stmt->bindValue(':image', $evenement->getImage());
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

}