<?php

class Rijschool
{
  private $db;
  public function __construct()
  {
    $this->db = new Database();
  }

  public function getInstructeurs()
  {
    try {
      $this->db->query("Select * from instructeur order by AantalSterren desc");
      $result = $this->db->resultSet();
      return $result ?? [];
    } catch (PDOException $ex) {
      $ex->getMessage();
    }
  }
}