<?php
class DomaineEV
{
    private $id_domaine;
    private $nom_domaine;

    public function __construct($id_domaine, $nom_domaine)
    {
        $this->id_domaine = $id_domaine;
        $this->nom_domaine = $nom_domaine;
    }

    public function getId_domaine()
    {
        return $this->id_domaine;
    }

    public function getNom_domaine()
    {
        return $this->nom_domaine;
    }

    public function setId_domaine($id_domaine)
    {
        $this->id_domaine = $id_domaine;
    }

    public function setNom_domaine($nom_domaine)
    {
        $this->nom_domaine = $nom_domaine;
    }
}