<?php
include_once '../../auth/config.php';
include_once '../../model/domaineEV.php';
class DomaineEVC
{
    public function listDomaines()
{
    $sql = "SELECT * FROM domaine";
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}

    public function addDomaine(DomaineEV $domaine)
    {
        $sql = "INSERT INTO domaine (id_domaine, nom_domaine) VALUES (:id_domaine, :nom_domaine)";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id_domaine', $domaine->getId_domaine());
            $stmt->bindValue(':nom_domaine', $domaine->getNom_domaine());
            $stmt->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function updateDomaine($id_domaine, DomaineEV $domaine)
    {
        $sql = "UPDATE domaine SET id_domaine = :id_domaine, nom_domaine = :nom_domaine WHERE id_domaine = :id_domaine";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id_domaine', $domaine->getId_domaine());
            $stmt->bindValue(':nom_domaine', $domaine->getNom_domaine());
            $stmt->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function deleteDomaine($id_domaine)
    {
        $sql = "DELETE FROM domaine WHERE id_domaine = :id_domaine";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id_domaine', $id_domaine);
            $stmt->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function getDomaine($id_domaine)
    {
        $sql = "SELECT * FROM domaine WHERE id_domaine = :id_domaine";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id_domaine', $id_domaine);
            $stmt->execute();
            $domaine = $stmt->fetch();
            return $domaine;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function searchDomaine($nom_domaine)
{
    $sql = "SELECT * FROM domaine WHERE nom_domaine = :nom_domaine";
    $db = config::getConnexion();
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':nom_domaine', $nom_domaine);
    try {
        $stmt->execute();
        $liste = $stmt->fetchAll();
        return $liste;
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}
    public function getLastId()
    {
        $sql = "SELECT MAX(id_domaine) as maxId FROM domaine";
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['maxId'];
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function domaineExists($nom_domaine)
{
    $sql = "SELECT COUNT(*) FROM domaine WHERE nom_domaine = :nom_domaine";
    $db = config::getConnexion();
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':nom_domaine', $nom_domaine);
    try {
        $stmt->execute();
        $result = $stmt->fetchColumn();
        return $result;
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}
public function getEventsByDomaine($id_domaine)
{
    $sql = "SELECT * FROM evenement WHERE id_domaine = :id_domaine";
    $db = config::getConnexion();
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id_domaine', $id_domaine);
    try {
        $stmt->execute();
        $liste = $stmt->fetchAll();
        return $liste;
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}
}
?>