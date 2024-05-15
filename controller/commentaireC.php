<?php
include "../../model/commentaire.php";
include_once '../../auth/config.php';

class CommentaireC
{
    private $db;

   
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
    public function listCommentairesByArticleId($id_article) {
        $sql = "SELECT * FROM commentaires WHERE id_article = :id_article";
        $this->db = config::getConnexion();
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id_article', $id_article);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getCommentbyId($id_commentaire)
  {
    $sql = "SELECT *FROM commentaires WHERE id_commentaire = ?";
    $db = config::getConnexion();
    try {
      $stmt = $db->prepare($sql);
      $stmt->execute([$id_commentaire]);
      $job_post = $stmt->fetch();
      return $job_post;
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
            $stmt->bindValue(':dateCommentaire', $Commentaire->getDateCommentaire());

            $stmt->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function updateCommentaire($id_commentaire, $new_comment)
{
    $sql = "UPDATE commentaires SET commentaire = :new_comment WHERE id_commentaire = :id_commentaire";
    $db = config::getConnexion();
    try {
        $stmt = $db->prepare($sql);
    
        // Bind the updated comment directly to the prepared statement
        $stmt->bindValue(':new_comment', $new_comment);
        $stmt->bindValue(':id_commentaire', $id_commentaire);
    
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

    public function rechercherCommentairesParIDBlog($idArticle) {
        $sql = "SELECT * FROM Commentaires WHERE id_article = :idArticle";
        $db = config::getConnexion();
        $stmt = $db->prepare($sql);
        $stmt->execute([':idArticle' => $idArticle]);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Commentaires');
        return $result;
    }
}
