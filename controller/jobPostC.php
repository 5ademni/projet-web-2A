<?php
include '../../auth/config.php';
include '../../model/jobPost.php';

class jobPostC
{
  public function listJobPosts()
  {
    $sql = "SELECT * FROM jobpostings";
    $db = config::getConnexion();
    try {
      $list = $db->query($sql);
      return $list;
    } catch (Exception $e) {
      die('Erreur: ' . $e->getMessage());
    }
  }
}
