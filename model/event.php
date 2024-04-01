<?php
class Evenement
{
    private $id_evenement;
    private $id_auteur;
    private $titre;
    private $contenu;
    private $datePublication;
    private $dateEvenement;
    private $lieu;
    private $prix;
    private $nbPlaces;
    private $nbPlacesRestantes;
    private $image;
    
    public function __construct($id_evenement, $id_auteur, $titre, $contenu, $datePublication, $dateEvenement, $lieu, $prix, $nbPlaces, $nbPlacesRestantes, $image)
    {
        $this->id_evenement = $id_evenement;
        $this->id_auteur = $id_auteur;
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->datePublication = $datePublication;
        $this->dateEvenement = $dateEvenement;
        $this->lieu = $lieu;
        $this->prix = $prix;
        $this->nbPlaces = $nbPlaces;
        $this->nbPlacesRestantes = $nbPlacesRestantes;
        $this->image = $image;
    }

    public function getIdEvenement()
    {
        return $this->id_evenement;
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
    public function getDateEvenement()
    {
        return $this->dateEvenement;
    }
    public function getLieu()
    {
        return $this->lieu;
    }
    public function getPrix()
    {
        return $this->prix;
    }
    public function getNbPlaces()
    {
        return $this->nbPlaces;
    }
    public function getNbPlacesRestantes()
    {
        return $this->nbPlacesRestantes;
    }
    public function getImage()
    {
        return $this->image;
    }

    public function setIdEvenement($id_evenement)
    {
        $this->id_evenement = $id_evenement;
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
    public function setDateEvenement($dateEvenement)
    {
        $this->dateEvenement = $dateEvenement;
    }
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;
    }
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }
    public function setNbPlaces($nbPlaces)
    {
        $this->nbPlaces = $nbPlaces;
    }
    public function setNbPlacesRestantes($nbPlacesRestantes)
    {
        $this->nbPlacesRestantes = $nbPlacesRestantes;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }
}