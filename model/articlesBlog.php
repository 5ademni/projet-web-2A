<?php

class ArticlesBlog
{
    private $id_article;
    private $id_auteur;
    private $titre;
    private $contenu;
    private $datePublication;
    
    public function __construct($id_article, $id_auteur, $titre, $contenu, $datePublication)
    {
        $this->id_article = $id_article;
        $this->id_auteur = $id_auteur;
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->datePublication = $datePublication;
    }

    public function getIdArticle()
    {
        return $this->id_article;
    }
    public function getIdAuteur()
    {
        return $this->id_auteur;
    }
    public function getTitre()
    {
        return $this->titre;
    }
    public function getContenu()
    {
        return $this->contenu;
    }
    public function getDatePublication()
    {
        return $this->datePublication;
    }

    public function setIdArticle($id_article)
    {
        $this->id_article = $id_article;
    }
    public function setIdAuteur($id_auteur)
    {
        $this->id_auteur = $id_auteur;
    }
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }
    public function setDatePublication($datePublication)
    {
        $this->datePublication = $datePublication;
    }
    

}