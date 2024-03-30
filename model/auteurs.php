<?php

class Auteurs
{
    private $id_auteur;
    private $nom;
    private $email;

    public function __construct($id_auteur, $nom, $email)
    {
        $this->id_auteur = $id_auteur;
        $this->nom = $nom;
        $this->email = $email;
    }

    public function getIdAuteur()
    {
        return $this->id_auteur;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setIdAuteur($id_auteur)
    {
        $this->id_auteur = $id_auteur;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    
}