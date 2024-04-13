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



  public function updateJobPost($id, JobPost $jobPost)
  {
    $sql = "UPDATE jobpostings SET Title = :title, JobDescription = :description, Salary = :salary, Status = :status, Company = :company, Location = :location, FieldID = :field_id, LevelID = :level_id, EmploymentTypeID = :employment_type_id WHERE JobID = :id";
    $db = config::getConnexion();
    try {
      $req = $db->prepare($sql);
      $req->bindValue(':id', $id);
      $req->bindValue(':title', $jobPost->getJobTitle());
      $req->bindValue(':description', $jobPost->getJobDescription());
      $req->bindValue(':salary', $jobPost->getSalary());
      $req->bindValue(':status', $jobPost->getStatus());
      $req->bindValue(':company', $jobPost->getCompanyName());
      $req->bindValue(':location', $jobPost->getLocation());
      $req->bindValue(':field_id', $jobPost->getFieldId());
      $req->bindValue(':level_id', $jobPost->getLevelId());
      $req->bindValue(':employment_type_id', $jobPost->getEmploymentTypeId());

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
