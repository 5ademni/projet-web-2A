<?php
class JobPost
{
  private $jobId;
  private $jobTitle;
  private $companyName;
  private $location;
  private $postingDate;
  private $salary;
  private $status;
  private $fieldID;
  private $levelID;
  private $employmentTypeID;
  private $jobDescription;

  public function __construct($jobId, $jobTitle, $companyName, $location, $postingDate, $salary, $status, $fieldID, $levelID, $employmentTypeID, $jobDescription)
  {
    $this->jobId = $jobId;
    $this->jobTitle = $jobTitle;
    $this->companyName = $companyName;
    $this->location = $location;
    $this->postingDate = $postingDate;
    $this->salary = $salary;
    $this->status = $status;
    $this->fieldID = $fieldID;
    $this->levelID = $levelID;
    $this->employmentTypeID = $employmentTypeID;
    $this->jobDescription = $jobDescription;
  }
  {
    $this->jobId = $jobId;
    $this->jobTitle = $jobTitle;
    $this->companyName = $companyName;
    $this->location = $location;
    $this->postingDate = $postingDate;
    $this->salary = $salary;
    $this->status = $status;
    $this->fieldID = $fieldID;
    $this->levelID = $levelID;
    $this->employmentTypeID = $employmentTypeID;
  }

  public function getJobId()
  {
    return $this->jobId;
  }

  public function getJobTitle()
  {
    return $this->jobTitle;
  }

  public function getCompanyName()
  {
    return $this->companyName;
  }

  public function getLocation()
  {
    return $this->location;
  }

  public function getPostingDate()
  {
    return $this->postingDate;
  }

  public function getSalary()
  {
    return $this->salary;
  }

  public function getStatus()
  {
    return $this->status;
  }

  public function getFieldID()
  {
    return $this->fieldID;
  }

  public function getLevelID()
  {
    return $this->levelID;
  }

  public function getEmploymentTypeID()
  {
    return $this->employmentTypeID;
  }

  public function getJobDescription()
  {
    return $this->jobDescription;
  }

  public function setJobId($jobId)
  {
    $this->jobId = $jobId;
  }

  public function setJobTitle($jobTitle)
  {
    $this->jobTitle = $jobTitle;
  }

  public function setCompanyName($companyName)
  {
    $this->companyName = $companyName;
  }

  public function setLocation($location)
  {
    $this->location = $location;
  }

  public function setPostingDate($postingDate)
  {
    $this->postingDate = $postingDate;
  }

  public function setSalary($salary)
  {
    $this->salary = $salary;
  }

  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function setFieldID($fieldID)
  {
    $this->fieldID = $fieldID;
  }

  public function setLevelID($levelID)
  {
    $this->levelID = $levelID;
  }

  public function setEmploymentTypeID($employmentTypeID)
  {
    $this->employmentTypeID = $employmentTypeID;
  }

  public function setJobDescription($jobDescription)
  {
    $this->jobDescription = $jobDescription;
  }
}
