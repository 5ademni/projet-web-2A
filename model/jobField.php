<?php

class JobField
{
  private $fieldID;
  private $fieldName;

  public function __construct($fieldID, $fieldName)
  {
    $this->fieldID = $fieldID;
    $this->fieldName = $fieldName;
  }

  public function getFieldID()
  {
    return $this->fieldID;
  }

  public function getFieldName()
  {
    return $this->fieldName;
  }

  public function setFieldID($fieldID)
  {
    $this->fieldID = $fieldID;
  }

  public function setFieldName($fieldName)
  {
    $this->fieldName = $fieldName;
  }
}
