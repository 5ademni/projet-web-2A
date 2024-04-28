<?php

class JobField
{
  private $fieldID;
  private $fieldName;
  private $description;

  public function __construct($fieldID, $fieldName, $description)
  {
    $this->fieldID = $fieldID;
    $this->fieldName = $fieldName;
    $this->description = $description;
  }

  public function getFieldID()
  {
    return $this->fieldID;
  }

  public function getFieldName()
  {
    return $this->fieldName;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setFieldID($fieldID)
  {
    $this->fieldID = $fieldID;
  }

  public function setFieldName($fieldName)
  {
    $this->fieldName = $fieldName;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }
}
