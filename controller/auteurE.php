<?php
include_once "../../auth/config.php";
include_once "../../model/auteurE2.php";
class auteurEC
{
    public function listAuteurs()
    {
        $sql = "SELECT * FROM auteurE";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function addAuteur($auteur)
{
    $db = config::getConnexion();

    // Générer un ID d'auteur unique de 8 chiffres
    $id_auteur = rand(10000000, 99999999);
    $result = $db->query("SELECT id_auteur FROM auteur WHERE id_auteur='$id_auteur'");

    while($result->rowCount() != 0){
        $id_auteur = rand(10000000, 99999999);
        $result = $db->query("SELECT id_auteur FROM auteur WHERE id_auteur='$id_auteur'");
    }

    $sql = "INSERT INTO auteur (id_auteur) VALUES (:id_auteur)";
    try {
        $req = $db->prepare($sql);

        $req->bindValue(':id_auteur', $id_auteur);

        $req->execute();
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}
public function deleteAuteur($id)
{
    $sql = "DELETE FROM auteur WHERE id_auteur = :id";
    $db = config::getConnexion();
    try {
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        $req->execute();
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}
public function existeAuteur($id)
{
    $sql = "SELECT * FROM auteur WHERE id_auteur = :id";
    $db = config::getConnexion();
    try {
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        $req->execute();
        if ($req->rowCount() == 0) {
            return false;
        } else {
            return true;
        }
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}}
?>
