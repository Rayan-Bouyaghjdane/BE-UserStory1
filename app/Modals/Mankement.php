<?php

class Mankement
{

  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getMankement()
  {
    $this->db->query("SELECT Mankement.Id, Mankement.AutoId, Mankement.Datum, Mankement.Mankement, Instructeur.Naam AS INNA, Instructeur.Email AS EM, Auto.Kenteken AS AK, Auto.Type AS AT
    FROM Mankement 
    INNER JOIN Auto
    ON Mankement.AutoId = Auto.Id
    INNER JOIN Instructeur
    ON Auto.InstructeurId = Instructeur.Id
    WHERE Instructeur.Id = 2
    ORDER BY Mankement.Datum DESC;");


    $result = $this->db->resultSet();

    return $result;
  }

  public function addMankement($post)
  {
    $sql = "INSERT INTO Mankement (AutoId, Mankement) VALUES ( 2, :Mankementen)";
    $this->db->query($sql);
    $this->db->bind(':Mankementen', $post['Mankementen']);
    return $this->db->execute();
  }
}