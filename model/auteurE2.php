<?php
class auteurE
{
    private $id_auteur;
    private $email;

public function __construct($id_auteur, $email)
{
    $this->id_auteur = $id_auteur;
    $this->email = $email;
}
public function getIdAuteur()
{
    return $this->id_auteur;
}   
public function setIdAuteur($id_auteur)
{
    $this->id_auteur = $id_auteur;
}
public function getEmail()
{
    return $this->email;
}
public function setEmail($email)
{
    $this->email = $email;
}
}
?>
