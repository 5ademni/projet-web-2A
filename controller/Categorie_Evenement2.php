<?php
include_once '../../auth/config.php';
include_once '../../model/Categorie_Evenement.php';

class CategorieEvenementC
{
    public function listCategories()
{
    $sql = "SELECT * FROM categorie_evenement"; // Modifier ici
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}



    public function addCategorie(CategorieEvenement $categorie)
    {
        $sql = "INSERT INTO categorie_evenement (id_categorie, nom_categorie) VALUES (:id_categorie, :nom_categorie)";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id_categorie', $categorie->getId_categorie());
            $stmt->bindValue(':nom_categorie', $categorie->getNom_categorie());

            $stmt->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }   
    public function deleteCategorie($id)
    {
        $sql = "DELETE FROM categorie_evenement WHERE id_categorie = :id";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id);

            $stmt->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function listCategorie_edit($id)
    {
        $sql = "SELECT * FROM categorie_evenement WHERE id_categorie = :id";
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
    public function updateCategorie($categorie, $id)
    {
        $sql = "UPDATE categorie_evenement SET nom_categorie = :nom_categorie WHERE id_categorie = :id";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':nom_categorie', $categorie->getNom_categorie());
            $stmt->bindValue(':id', $id);

            $stmt->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function searchCategorie($nom_categorie)
    {
        $sql = "SELECT * FROM categorie_evenement WHERE nom_categorie LIKE '%$nom_categorie%'";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function searchCategorieById($id_categorie)
    {
        $sql = "SELECT * FROM categorie_evenement WHERE id_categorie = $id_categorie";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function afficherevenement($id_categorie)
    {
        $sql = "SELECT * FROM evenement WHERE id_categorie = $id_categorie";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
?>