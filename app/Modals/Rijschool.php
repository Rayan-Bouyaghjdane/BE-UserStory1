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

  public function getInstructeurById($id)
  {
    $this->db->query("Select * from instructeur Where Id = :id");
    $this->db->bind(':id', $id);
    return $this->db->single();
  }

  public function getVehiclesByInstructeurId($id)
  {
    $this->db->query("Select * 
                      From voertuiginstructeur 
                      Inner join voertuig
                      on voertuiginstructeur.VoertuigId = voertuig.Id
                      Inner join instructeur
                      on voertuiginstructeur.InstructeurId = instructeur.Id
                      Inner join typevoertuig
                      on voertuig.TypeVoertuigId = typevoertuig.Id
                      Where voertuiginstructeur.InstructeurId = :id
                      Order by typevoertuig.Rijbewijscategorie asc");

    $this->db->bind(':id', $id);
    return $this->db->resultSet();
  }

  public function getVoertuigById($id)
  {
    $this->db->query("Select *
                      From voertuig
                      Inner join typevoertuig
                      on voertuig.TypeVoertuigId = typevoertuig.Id
                      Where voertuig.Id not in (select voertuiginstructeur.voertuigId from voertuiginstructeur where voertuiginstructeur.InstructeurId = :id)");

    $this->db->bind(':id', $id);
    return $this->db->resultSet();
  }
}