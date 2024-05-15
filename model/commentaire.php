<?php

class Commentaire
{
    private $id_commentaire;
    private $id_article;
    private $nom;
    private $commentaire;
    private $dateCommentaire;

    public function __construct($id_commentaire, $id_article, $nom, $commentaire, $dateCommentaire)
    {
        $this->id_commentaire = $id_commentaire;
        $this->id_article = $id_article;
        $this->nom = $nom;
        $this->commentaire = $commentaire;
        $this->dateCommentaire = $dateCommentaire;
    }

    public function getIdCommentaire()
    {
        return $this->id_commentaire;
    }
    public function getIdArticle()
    {
        return $this->id_article;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getCommentaire()
    {
        return $this->commentaire;
    }
    public function getDateCommentaire()
    {
        return $this->dateCommentaire;
    }

    public function setIdCommentaire($id_commentaire)
    {
        $this->id_commentaire = $id_commentaire;
    }
    public function setIdArticle($id_article)
    {
        $this->id_article = $id_article;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }
    public function setDateCommentaire($dateCommentaire)
    {
        $this->dateCommentaire = $dateCommentaire;
    }
    
}