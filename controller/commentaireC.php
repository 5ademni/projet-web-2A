<?php
include "../auth/config.php";
include "../model/commentaire.php";

class CommentaireC
{
    public function listCommentaires()
    {
        $sql = "SELECT * FROM commentaires";
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
        $sql = "INSERT INTO commentaires (id_commentaire, id_article, id_auteur, contenu, datePublication) VALUES (NULL, '1', '1', 'Dummy Commentaire', '2021-06-01')";
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
        $sql = "DELETE FROM commentaires WHERE id_commentaire = :id_commentaire";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id_commentaire', $id_commentaire);
            $stmt->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function addCommentaire(Commentaires $Commentaire)
    {
        $sql = "INSERT INTO commentaires (id_commentaire, id_article, nom, commentaire, dateCommentaire) VALUES (:id_commentaire, :id_article, :nom, :commentaire, :dateCommentaire)";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);

            $stmt->bindValue(':id_commentaire', $Commentaire->getIdCommentaire());
            $stmt->bindValue(':id_article', $Commentaire->getIdArticle());
            $stmt->bindValue(':nom', $Commentaire->getNom());
            $stmt->bindValue(':commentaire', $Commentaire->getCommentaire());
            $stmt->bindValue(':commentaire', $Commentaire->getDateCommentaire());

            $stmt->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function updateCommentaire(Commentaires $Commentaire)
    {
        $sql = "UPDATE commentaires SET id_commentaire = :id_commentaire, id_article = :id_article, nom = :nom, commentaire = :commentaire, dateCommentaire= :dateCommentaire WHERE id_commentaire = :id_commentaire";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);

            $stmt->bindValue(':id_commentaire', $Commentaire->getIdCommentaire());
            $stmt->bindValue(':id_article', $Commentaire->getIdArticle());
            $stmt->bindValue(':nom', $Commentaire->getNom());
            $stmt->bindValue(':commentaire', $Commentaire->getCommentaire());
            $stmt->bindValue(':commentaire', $Commentaire->getDateCommentaire());

            $stmt->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function getCommentaire($id_commentaire)
    {
        $sql = "SELECT * FROM commentaires WHERE id_commentaire = :id_commentaire";
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
