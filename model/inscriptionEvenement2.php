<?php
class inscriptionE
{
    private $id_inscription;
    private $id_evenement;
    private $id_auteur;
    private $date_inscription;

    public function __construct($id_inscription, $id_evenement, $id_auteur, $date_inscription)
    {
        $this->id_inscription = $id_inscription;
        $this->id_evenement = $id_evenement;
        $this->id_auteur = $id_auteur;
        $this->date_inscription = $date_inscription;
    }
    public function getIdInscription()
    {
        return $this->id_inscription;
    }

    public function getIdEvenement()
    {
        return $this->id_evenement;
    }

    public function getIdAuteur()
    {
        return $this->id_auteur;
    }

    public function getDate()
    {
        return $this->date_inscription;
    }

    public function setIdInscription($id_inscription)
    {
        $this->id_inscription = $id_inscription;
    }

    public function setIdEvenement($id_evenement)
    {
        $this->id_evenement = $id_evenement;
    }

    public function setIdAuteur($id_auteur)
    {
        $this->id_auteur = $id_auteur;
    }

    public function setDate($date)
    {
        $this->date = $date_inscription;
    }
}