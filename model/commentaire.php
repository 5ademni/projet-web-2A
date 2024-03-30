<?php

class Commentaire
{
    private $id_commentaire;
    private $id_article;
    private $nom;
    private $commenataire;
    private $dateCommantaire;

    public function __construct($id_commentaire, $id_article, $nom, $commenataire, $dateCommantaire)
    {
        $this->id_commentaire = $id_commentaire;
        $this->id_article = $id_article;
        $this->nom = $nom;
        $this->commenataire = $commenataire;
        $this->dateCommantaire = $dateCommantaire;
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
        return $this->commenataire;
    }
    public function getDateCommentaire()
    {
        return $this->dateCommantaire;
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
    public function setCommentaire($commenataire)
    {
        $this->commenataire = $commenataire;
    }
    public function setDateCommentaire($dateCommantaire)
    {
        $this->dateCommantaire = $dateCommantaire;
    }
    
}