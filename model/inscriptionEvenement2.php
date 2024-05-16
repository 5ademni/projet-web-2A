<?php
class inscriptionE
{
    private $id_inscription;
    private $id_evenement;
    private $id_admin;
    private $date_inscription;

    public function __construct($id_inscription, $id_evenement, $id_admin, $date_inscription)
    {
        $this->id_inscription = $id_inscription;
        $this->id_evenement = $id_evenement;
        $this->id_admin = $id_admin;
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

    public function getIdadmin()
    {
        return $this->id_admin;
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

    public function setIdadmin($id_admin)
    {
        $this->id_admin = $id_admin;
    }

    public function setDate($date)
    {
        $this->date = $date_inscription;
    }
}