<?php
include_once '../../auth/config.php';
include_once '../../model/jobPost.php';

class JobPostC
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

  public function getJobPostById($id)
  {
    $sql = "SELECT jobpostings.*, fields.FieldName, levels.LevelName, employmenttypes.EmploymentTypeName 
        FROM jobpostings 
        LEFT JOIN fields ON jobpostings.FieldID = fields.FieldID 
        LEFT JOIN levels ON jobpostings.LevelID = levels.LevelID 
        LEFT JOIN employmenttypes ON jobpostings.EmploymentTypeID = employmenttypes.EmploymentTypeID
        WHERE jobpostings.JobID = ?";
    $db = config::getConnexion();
    try {
      $stmt = $db->prepare($sql);
      $stmt->execute([$id]);
      $job_post = $stmt->fetch();
      return $job_post;
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

  public function deleteJobPost($id)
  {
    $sql = "DELETE FROM jobpostings WHERE JobID = :id";
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':id', $id);
    try {
      $req->execute();
    } catch (Exception $e) {
      die('Erreur: ' . $e->getMessage());
    }
  }

  public function updateJobPost($id, $title, $type, $field, $company, $location, $status, $description)
  {
    $sql = "UPDATE jobpostings SET Title = :title, EmploymentTypeName = :type, FieldName = :field, Company = :company, Location = :location, Status = :status, JobDescription = :description WHERE JobID = :id";
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':id', $id);
    $req->bindValue(':title', $title);
    $req->bindValue(':type', $type);
    $req->bindValue(':field', $field);
    $req->bindValue(':company', $company);
    $req->bindValue(':location', $location);
    $req->bindValue(':status', $status);
    $req->bindValue(':description', $description);
    try {
      $req->execute();
    } catch (Exception $e) {
      die('Erreur: ' . $e->getMessage());
    }
  }

  public function addJobPost($job_post)
  {
    $sql = "INSERT INTO jobpostings (Title, Company, Location, PostingDate, Salary, Status, FieldID, LevelID, EmploymentTypeID, JobDescription) VALUES (:title, :company, :location, :postingDate, :salary, :status, :fieldID, :levelID, :employmentTypeID, :description)";
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':title', $job_post->Title);
    $req->bindValue(':company', $job_post->Company);
    $req->bindValue(':location', $job_post->Location);
    $req->bindValue(':postingDate', $job_post->PostingDate);
    $req->bindValue(':salary', $job_post->Salary);
    $req->bindValue(':status', $job_post->Status);
    $req->bindValue(':fieldID', $job_post->FieldID);
    $req->bindValue(':levelID', $job_post->LevelID);
    $req->bindValue(':employmentTypeID', $job_post->EmploymentTypeID);
    $req->bindValue(':description', $job_post->JobDescription);
    try {
      $req->execute();
    } catch (Exception $e) {
      die('Erreur: ' . $e->getMessage());
    }
  }
}
