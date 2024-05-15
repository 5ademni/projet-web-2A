<?php
class auteurE
{
    private $id_auteur;
public function __construct($id_auteur,)
{
    $this->id_auteur = $id_auteur;
}
public function getIdAuteur()
{
    return $this->id_auteur;
}   
public function setIdAuteur($id_auteur)
{
    $this->id_auteur = $id_auteur;
}
}
?>
