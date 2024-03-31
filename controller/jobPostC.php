<?php
include '../../auth/config.php';
include '../../model/jobPost.php';

class jobPostC
{
  public function listJobPosts()
  {
    $sql = "SELECT jobpostings.*, fields.FieldName, levels.LevelName, employmenttypes.EmploymentTypeName 
        FROM jobpostings 
        LEFT JOIN fields ON jobpostings.FieldID = fields.FieldID 
        LEFT JOIN levels ON jobpostings.LevelID = levels.LevelID 
        LEFT JOIN employmenttypes ON jobpostings.EmploymentTypeID = employmenttypes.EmploymentTypeID";
    $db = config::getConnexion();
    try {
      $list = $db->query($sql);
      return $list;
    } catch (Exception $e) {
      die('Erreur: ' . $e->getMessage());
    }
  }

  public function countJobPosts()
  {
    $sql = "SELECT COUNT(*) as total FROM jobpostings";
    $db = config::getConnexion();
    try {
      $count = $db->query($sql)->fetch();
      return $count['total'];
    } catch (Exception $e) {
      die('Erreur: ' . $e->getMessage());
    }
  }
}
