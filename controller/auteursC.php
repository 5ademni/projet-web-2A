<?php
include_once "../../auth/config.php";
include_once "../../model/auteurs.php";


class AuteursC
{
    public function listAuteurs()
    {
        $sql = "SELECT * FROM auteurs";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function addDummyAuteur()
    {
        $sql = "INSERT INTO auteurs (id_auteur, nom, email) VALUES (NULL, 'Dummy Auteur', 'heni@esprit.tn')";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $dummyData = [
                'id_auteur' => NULL,
                'nom' => 'Dummy Auteur',
                'email' => 'heni@esprit.tn'
            ];
            $stmt->execute($dummyData);
        }catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function deleteAuteur($id_auteur)
    {
        $sql = "DELETE FROM auteurs WHERE id_auteur = :id_auteur";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id_auteur', $id_auteur);
            $stmt->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function addAuteur(Auteurs $auteurs)
    {
        $sql = "INSERT INTO auteurs (id_auteur, nom, email) VALUES (:id_auteur, :nom, :email)";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);

            $stmt->bindvalue(':id_auteur', $auteurs->getIdAuteur());
            $stmt->binvalue(':nom', $auteurs->getNom());
            $stmt->binvalue(':email', $auteurs->getEmail());
            $stmt->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function updateAuteur($auteurs, $id_auteur)
    {
        $sql = "UPDATE auteurs SET nom = :nom, email = :email WHERE id_auteur = :id_auteur";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);

            $stmt->bindvalue(':id_auteur', $auteurs->getIdAuteur());
            $stmt->binvalue(':nom', $auteurs->getNom());
            $stmt->binvalue(':email', $auteurs->getEmail());
            $stmt->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function getAuteur($id_auteur)
    {
        $sql = "SELECT * FROM auteurs WHERE id_auteur = :id_auteur";
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


public function afficheArticle($id_article) {
    try {
        $pdo = config::getConnexion();
        $query = $pdo->prepare("SELECT * FROM articlesblog WHERE id_article = : id_article");
        $query->execute(['id_article' => $id_article]);
        return $query->fetchAll();
    } catch (PDOException $e) {
    echo $e->getMessage();
    }
}


public function afficheAuteur() {
    try {
        $pdo = config::getConnexion();
        $query = $pdo->prepare("SELECT * FROM auteurs") ;
        $query->execute();
        return $query->fetchAll();
    } catch (PDOException $e) {
    echo $e->getMessage();
    }
}


    public function listAuteur_edit($id)
    {
        $sql = "SELECT * FROM auteurs WHERE id_auteur = :id";
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



    public function searchAuteur($nom)
    {
        $sql = "SELECT * FROM auteurs WHERE nom LIKE '%$nom%'";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function searchAuteurById($id_auteur)
    {
        $sql = "SELECT * FROM auteurs WHERE id_auteur = $id_auteur";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
