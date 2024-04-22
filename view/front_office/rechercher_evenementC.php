<?php
include_once '../../controller/Categorie_Evenement2.php';
$CategorieEvenementC = new CategorieEvenementC();
$categories = $CategorieEvenementC->listCategories();
?>

<form action="trouver_evenement.php" method="get">
  <select name="categorie">
    <option value="">Sélectionnez une catégorie</option>
    <?php
    foreach ($categories as $categorie) {
        echo "<option value=\"" . $categorie['id_categorie'] . "\">" . $categorie['nom_categorie'] . "</option>";
    }
    ?>
  </select>
  <input type="submit" value="Rechercher">
</form>
