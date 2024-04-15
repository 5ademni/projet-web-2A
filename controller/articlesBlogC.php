<?php
include "../../auth/config.php";
include "../../model/articlesBlog.php";

class ArticlesBlogC
{
    public function listArticles()
    {
        $sql = "SELECT * FROM articlesblog";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function addDummyArticle()
    {
        $sql = "INSERT INTO articlesblog (id_article, id_auteur, titre, contenu, datePublication) VALUES (NULL, '1', 'Dummy Blog', 'Dummy Blog Content', '2021-06-01')";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $dummyData = [
                'id_article' => NULL,
                'id_auteur' => 1,
                'titre' => 'Dummy Blog',
                'contenu' => 'Dummy Blog Content',
                'datePublication' => '2021-06-01'
            ];

            $stmt->execute($dummyData);
        }catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function deleteArticle($id_article)
    {
        $sql = "DELETE FROM articlesblog WHERE id_article = :id_article";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id_article', $id_article);
            $stmt->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function addArticle(ArticlesBlog $ArticlesBlog)
    {
        $sql = "INSERT INTO articlesblog (id_article, id_auteur, titre, contenu, datePublication) VALUES (:id_article, :id_auteur, :titre, :contenu, :datePublication)";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);

            $stmt->bindvalue(':id_article', $ArticlesBlog->getIdArticle());
            $stmt->bindvalue(':id_auteur', $ArticlesBlog->getIdAuteur());
            $stmt->bindvalue(':titre', $ArticlesBlog->getTitre());
            $stmt->bindvalue(':contenu', $ArticlesBlog->getContenu());
            $stmt->bindvalue(':datePublication', $ArticlesBlog->getDatePublication());

            $stmt->execute();
        }catch (Exception $e)
        {
            die('erreur: '.$e->getMessage());
        }
        }

        public function updateArticle($id, ArticlesBlog $ArticlesBlog)
        {
            $sql = "UPDATE articlesblog SET id_article = :id_article, id_auteur = :id_auteur, titre = :titre, contenu = :contenu, datePublication = :datePublication WHERE id_article = :id";
            $db = config::getConnexion();
            try {
                $stmt = $db->prepare($sql);
                $stmt->bindValue(':id_article', $ArticlesBlog->getIdArticle());
                $stmt->bindValue(':id_auteur', $ArticlesBlog->getIdAuteur()); // corrected here
                $stmt->bindValue(':titre', $ArticlesBlog->getTitre());
                $stmt->bindValue(':contenu', $ArticlesBlog->getContenu());
                $stmt->bindValue(':datePublication', $ArticlesBlog->getDatePublication());
                $stmt->bindValue(':id', $id);
                $stmt->execute();
            }catch (Exception $e){
            die('Erreur: '.$e->getMessage());
            } 
        }

    public function getArticle($id_article)
    {
        $sql = "SELECT * FROM articlesblog WHERE id_article = : id_article";
        $db = config::getConnexion();
        try{
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id_article', $id_article);
            $stmt->execute();
            return $stmt->fetch();
        }catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }

}


