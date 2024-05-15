<?php
include "../auth/config.php";
include "../model/commentaire.php";

class CommentaireC
{
    public function listCommentaires()
    {
        $sql = "SELECT * FROM commentaire";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function addDummyCommentaire()
    {
        $sql = "INSERT INTO commentaire (id_commentaire, id_article, id_auteur, contenu, datePublication) VALUES (NULL, '1', '1', 'Dummy Commentaire', '2021-06-01')";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $dummyData = [
                'id_commentaire' => NULL,
                'id_article' => 1,
                'id_auteur' => 1,
                'contenu' => 'Dummy Commentaire',
                'datePublication' => '2021-06-01'
            ];

            $stmt->execute($dummyData);
        }catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function deleteCommentaire($id_commentaire)
    {
        $sql = "DELETE FROM commentaire WHERE id_commentaire = :id_commentaire";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id_commentaire', $id_commentaire);
            $stmt->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function addCommentaire(Commentaire $Commentaire)
    {
        $sql = "INSERT INTO commentaire (id_commentaire, id_article, id_auteur, contenu, datePublication) VALUES (:id_commentaire, :id_article, :id_auteur, :contenu, :datePublication)";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);

            $stmt->bindvalue(':id_commentaire', $Commentaire->getIdCommentaire());
            $stmt->binvalue(':id_article', $Commentaire->getIdArticle());
            $stmt->binvalue(':id_auteur', $Commentaire->getIdCommentaire());
            $stmt->binvalue(':contenu', $Commentaire->getNom());
            $stmt->binvalue(':datePublication', $Commentaire->getDateCommentaire());

            $stmt->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function updateCommentaire(Commentaire $Commentaire)
    {
        $sql = "UPDATE commentaire SET id_article = :id_article, id_auteur = :id_auteur, contenu = :contenu, datePublication = :datePublication WHERE id_commentaire = :id_commentaire";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);

            $stmt->bindvalue(':id_commentaire', $Commentaire->getIdCommentaire());
            $stmt->binvalue(':id_article', $Commentaire->getIdArticle());
            $stmt->binvalue(':id_auteur', $Commentaire->getNom());
            $stmt->binvalue(':contenu', $Commentaire->getCommentaire());
            $stmt->binvalue(':datePublication', $Commentaire->getDateCommentaire());

            $stmt->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function getCommentaire($id_commentaire)
    {
        $sql = "SELECT * FROM commentaire WHERE id_commentaire = :id_commentaire";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id_commentaire', $id_commentaire);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
