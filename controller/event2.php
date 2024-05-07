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
        $db = config::getConnexion();

        // Générer un ID d'événement unique de 8 chiffres
        $id_evenement = rand(10000000, 99999999);
        $result = $db->query("SELECT id_evenement FROM evenement WHERE id_evenement='$id_evenement'");
    
        while($result->rowCount() != 0){
            $id_evenement = rand(10000000, 99999999);
            $result = $db->query("SELECT id_evenement FROM evenement WHERE id_evenement='$id_evenement'");
        }
    
        // Mettre à jour l'ID de l'événement
        $evenement->setIdEvenement($id_evenement);
    
        $sql = "INSERT INTO evenement (id_evenement,id_auteur, titre, contenu, dateEvenement, lieu, prix, nbPlaces, image,heureEvenement,id_categorie,id_domaine) VALUES (:id_evenement,:id_auteur, :titre, :contenu, :dateEvenement, :lieu, :prix, :nbPlaces, :image,:heureEvenement,:id_categorie,:id_domaine)";
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
            $stmt->bindValue(':id_domaine', $evenement->getIdDomaine());

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
        $sql = "UPDATE evenement SET id_auteur = :id_auteur, titre = :titre, contenu = :contenu, dateEvenement = :dateEvenement, lieu = :lieu, prix = :prix, nbPlaces = :nbPlaces, image = :image , heureEvenement = :heureEvenement , id_categorie = :id_categorie, id_domaine = :id_domaine WHERE id_evenement = :id";
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
            $stmt->bindValue(':id_categorie', $evenement->getIdCategorie());
            $stmt->bindValue(':id_domaine', $evenement->getIdDomaine());
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
public function getEventsByDomaine($id_domaine)
{
    $sql = "SELECT * FROM evenement WHERE id_domaine = :id_domaine";
    $db = config::getConnexion();
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id_domaine', $id_domaine);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}
public function trierEventsParPrixCroissant()
{
    $sql = "SELECT * FROM evenement WHERE nbPlaces > 0 ORDER BY prix ASC";
    $db = config::getConnexion();
    try {
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}
public function trierEventsParPrixDecroissant()
{
    $sql = "SELECT * FROM evenement WHERE nbPlaces > 0 ORDER BY prix DESC";
    $db = config::getConnexion();
    try {
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}
public function trierEventsParDateCroissante()
{
    $sql = "SELECT * FROM evenement WHERE nbPlaces > 0 ORDER BY dateEvenement ASC";
    $db = config::getConnexion();
    try {
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}
public function trierEventsParDateDecroissante()
{
    $sql = "SELECT * FROM evenement WHERE nbPlaces > 0 ORDER BY dateEvenement DESC";
    $db = config::getConnexion();
    try {
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}
public function getOrganisateur($event_id) {
    $db = config::getConnexion();
    $sql = "SELECT auteur.* FROM auteur JOIN evenement ON auteur.id_auteur = evenement.id_auteur WHERE evenement.id_evenement = :id_evenement";
    $stmt = $db->prepare($sql);
    $stmt->execute([':id_evenement' => $event_id]);
    $organisateur = $stmt->fetch();
    return $organisateur;
}
public function deleteEvenementsByDomaine($id_domaine)
{
    $sql = "DELETE FROM evenement WHERE id_domaine = :id_domaine";
    $db = config::getConnexion();
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id_domaine', $id_domaine);
    try {
        $stmt->execute();
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}
public function deleteEvenementsByCategorie($id_categorie)
{
    $sql = "DELETE FROM evenement WHERE id_categorie = :id_categorie";
    $db = config::getConnexion();
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id_categorie', $id_categorie);
    try {
        $stmt->execute();
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}
    public function deleteProduitsByCategorie($id_categorie)
{
    $sql = "DELETE FROM evenement WHERE id_categorie = :id_categorie";
    $db = config::getConnexion();
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id_categorie', $id_categorie);
    try {
        $stmt->execute();
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
}
}

}
?>