<?php


class SpecialiteC {
    public function listspecialites() {
        $sql = "SELECT * FROM specialite ";
        $db = config::getConnexion();
        
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deletespecialite($ids) {
        $sql = "DELETE FROM specialite WHERE ids = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ids);
        
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addSpecialite($specialite) {
        $sql = "INSERT INTO specialite (noms, descrips) VALUES (:nomC, :descriptionC)";
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nomC' => $specialite->getNomC(),
                'descriptionC' => $specialite->getDescriptionC()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function getSpecialite($ids) {
        $sql = "SELECT * FROM specialite WHERE ids = :ids";
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':ids', $ids, PDO::PARAM_INT);
            $query->execute();
            $categorie = $query->fetch(PDO::FETCH_ASSOC);
            return $categorie;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function updatespecialite($specialite, $ids) {
        try {
            $db = config::getConnexion();
            $query = $db->prepare('UPDATE specialite SET noms= :nomC, descrips = :descriptionC WHERE ids = :idspecialite');
            $query->execute([
                'idspecialite' => $ids,
                'nomC' => $specialite->getNomC(),
                'descriptionC' => $specialite->getDescriptionC()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    public function afficheform($ids){
        try{
            $db = config::getConnexion();
            $query = $db->prepare("SELECT * FROM formation WHERE ids = :idspecialite");
            $query->execute(['idspecialite' => $ids]);
            return $query->fetchAll();
        } 
        catch (PDOException $e) 
        {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    public function affichespecialite(){
        try{
            $db= config::getConnexion();
            $query = $db->prepare("SELECT * FROM specialite");
            $query->execute();
            return $query->fetchAll();
        } 
        catch (PDOException $e) 
        {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>