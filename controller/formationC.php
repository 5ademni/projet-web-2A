<?php

//include '../Model/specialite.php';

class formationC
{
    public function listFormations()
    {
        $sql = "SELECT e.id_formation,e.titre_formation, e.duretotale_formation, e.description_formation,e.prix_formation,c.noms ,e.image FROM formation e INNER JOIN specialite c ON e.ids = c.ids";

        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    //fonction tri
    public function listFormation($specialiteId = null)
    {
        $sql = "SELECT e.id_formation,e.titre_formation, e.duretotale_formation, e.description_formation,e.prix_formation,c.noms,e.image FROM formation e INNER JOIN specialite c ON e.ids = c.ids";

        if ($specialiteId) {
            $sql .= " WHERE c.ids = :specialiteId";
        }

        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);

            if ($specialiteId) {
                $stmt->bindParam(':specialiteId', $specialiteId);
            }

            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteFormation($id)
    {
        $sql = "DELETE FROM formation WHERE id_formation = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addFormation($formation)
    {
        $sql = "INSERT INTO formation  
        VALUES (NULL, :titre_formation, :duretotale_formation, :description_formation, :prix_formation, :image, :ids)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'titre_formation' => $formation->getTitre_formation(),
                'duretotale_formation' => $formation->getDuretotale_formation(),
                'description_formation' => $formation->getDescription_formation(),
                'prix_formation' => $formation->getPrix_formation(),
                'ids' => $formation->getIds(),
                'image' => $formation->getImage(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function updateFormation($formation, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE formation SET 
                    titre_formation = :titre, 
                    duretotale_formation = :duree, 
                    description_formation = :description,
                    prix_formation = :prix,
                    image = :image
      WHERE id_formation = :id'
            );
            $query->execute([
                'id' => $id,
                'titre' => $formation->getTitre_formation(),
                'duree' => $formation->getDuretotale_formation(),
                'description' => $formation->getDescription_formation(),
                'prix' => $formation->getPrix_formation(),
                'image' => $formation->getImage(),


            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function showFormation($id)
    {
        $sql = "SELECT f.*, s.noms AS noms
            FROM formation f
            JOIN specialite s ON f.ids = s.ids
            WHERE f.id_formation = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            $formation = $query->fetch(PDO::FETCH_OBJ);  // Fetch as an object
            return $formation;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function showfor($id)
    {
        $sql = "SELECT f.*, s.noms AS noms
            FROM formation f
            JOIN specialite s ON f.ids = s.ids
            WHERE f.id_formation = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();

            $formation = $query->fetch(PDO::FETCH_ASSOC);
            return $formation;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

}
