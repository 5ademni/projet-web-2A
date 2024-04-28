<?php
include_once '../../auth/config.php';
include_once '../../model/jobPost.php';

class JobFieldC
{
  public function listJobFields()
  {
    $sql = "SELECT * FROM fields";
    $db = config::getConnexion();
    try {
      $list = $db->query($sql);
      return $list;
    } catch (Exception $e) {
      die('Erreur: ' . $e->getMessage());
    }
  }

  public function countFields()
  {
    $sql = "SELECT COUNT(*) FROM fields";
    $db = config::getConnexion();
    try {
      $stmt = $db->query($sql);
      return $stmt->fetchColumn();
    } catch (Exception $e) {
      die('Erreur: ' . $e->getMessage());
    }
  }


  public function deleteField($fieldId)
  {
    $sql = "DELETE FROM fields WHERE FieldID = :fieldId";
    $db = config::getConnexion();
    $stmt = $db->prepare($sql);
    try {
      $stmt->execute([':fieldId' => $fieldId]);
    } catch (Exception $e) {
      die('Erreur: ' . $e->getMessage());
    }
  }


  public function updateField($oldFieldId, $field)
  {
    $sql = "UPDATE fields SET FieldID = :newFieldId, FieldName = :fieldName, Description = :description WHERE FieldID = :oldFieldId";
    $db = config::getConnexion();
    $stmt = $db->prepare($sql);
    try {
      $stmt->execute([
        ':oldFieldId' => $oldFieldId,
        ':newFieldId' => $field->getFieldId(),
        ':fieldName' => $field->getFieldName(),
        ':description' => $field->getDescription()
      ]);
    } catch (Exception $e) {
      die('Erreur: ' . $e->getMessage());
    }
  }


  public function addField($fieldId, $fieldName, $description)
  {
    $sql = "INSERT INTO fields (FieldID, FieldName, Description) VALUES (:fieldId, :fieldName, :description)";
    $db = config::getConnexion();
    $stmt = $db->prepare($sql);
    try {
      $stmt->execute([':fieldId' => $fieldId, ':fieldName' => $fieldName, ':description' => $description]);
    } catch (Exception $e) {
      die('Erreur: ' . $e->getMessage());
    }
  }

  // Function to get a job field by id
  public function getFieldById($fieldId)
  {
    $sql = "SELECT * FROM fields WHERE FieldID = :fieldId";
    $db = config::getConnexion();
    $stmt = $db->prepare($sql);
    try {
      $stmt->execute([':fieldId' => $fieldId]);
      return $stmt->fetch();
    } catch (Exception $e) {
      die('Erreur: ' . $e->getMessage());
    }
  }
}
