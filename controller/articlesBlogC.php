<?php
include "../../auth/config.php";
include "../../model/articlesBlog.php";
require __DIR__ . '../../../projet-web-2A/twilio-php-main/src/Twilio/autoload.php';

use Twilio\Rest\Client;
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
        } catch (Exception $e) {
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
        $sql = "INSERT INTO articlesblog ( id_auteur, titre, contenu, datePublication) VALUES ( :id_auteur, :titre, :contenu, :datePublication)";
        $db = config::getConnexion(); // Assuming config::getConnexion() is a valid database connection method
        try {
            $stmt = $db->prepare($sql);

            $stmt->bindValue(':id_auteur', $ArticlesBlog->getIdAuteur());
            $stmt->bindValue(':titre', $ArticlesBlog->getTitre());
            $stmt->bindValue(':contenu', $ArticlesBlog->getContenu());
            $stmt->bindValue(':datePublication', $ArticlesBlog->getDatePublication());
            $stmt->execute();

            // After successfully inserting the article, send an SMS using Twilio
            $account_sid = 'AC91a50383419acdf7cadecda20c603b66'; // Your Twilio Account SID
            $auth_token = 'cac2f531d3fbc24a0b1afd4bac6b3392'; // Your Twilio Auth Token
            $twilio_number = "+18787288349"; // Your Twilio phone number
            
            $client = new Client($account_sid, $auth_token);

            $client->messages->create(
                '+21655448828',  // Destination number
                [
                    'from' => $twilio_number,
                    'body' => 'Félicitations ! Votre blog a été ajouté avec succès. Merci pour votre contribution professionnelle.' 

                ]
            );

            // Optionally, you can log or handle the message status or any errors
            // For example:
            // echo "Message SID: " . $message->sid;

        } catch (Exception $e) {
            die('erreur: ' . $e->getMessage());
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
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function getArticle($id_article)
    {
        $sql = "SELECT * FROM articlesblog WHERE id_article = :id_article";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id_article', $id_article);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    public function getArticlesById($id_article)
    {
        $sql = "SELECT * FROM articlesblog WHERE id_article = :id_article";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id_article', $id_article);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function getArticlesByAuteurId($id_auteur)
    {
        $sql = "SELECT * FROM articlesblog WHERE id_auteur = :id_auteur";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id_auteur', $id_auteur);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }





    public function trierArticlesParContenuCroissant()
    {
        $sql = "SELECT * FROM articlesblog ORDER BY contenu ASC";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function trierArticlesParContenuDecroissant()
    {
        $sql = "SELECT * FROM articlesblog ORDER BY contenu DESC";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function trierArticlesParDateCroissante()
    {
        $sql = "SELECT * FROM articlesblog ORDER BY datePublication ASC";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function trierArticlesParDateDecroissante()
    {
        $sql = "SELECT * FROM articlesblog ORDER BY datePublication DESC";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }



    

}
