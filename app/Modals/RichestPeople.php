<?php

class RichestPeople
{

  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function deleteRichestPeople($id)
  {
    // var_dump($this->db);
    // exit();
    try {
      $this->db->query('DELETE FROM richestpeople WHERE id = :id');
      $this->db->bind(':id', $id, PDO::PARAM_INT);
      return $this->db->execute();
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public function getRichestPeople()
  {
    $this->db->query('SELECT * FROM richestpeople');
    return $this->db->resultSet();
  }

  public function getSingleRichestPeople($id)
  {
    $this->db->query('SELECT * FROM richestpeople WHERE id = :id');
    $this->db->bind(':id', $id);
    return $this->db->single();
  }

  public function createRichestPeople($post)
  {
    $this->db->query('INSERT INTO `richestpeople` (`id`, `Name`, `Nethworth`, `Age`, `MyCompany`) VALUES (NULL, :namex, :nethworth, :age, :mycompany);');
    $this->db->bind(':namex', $post['Name']);
    $this->db->bind(':nethworth', $post['Nethworth']);
    $this->db->bind(':age', $post['Age']);
    $this->db->bind(':mycompany', $post['MyCompany']);
    return $this->db->execute();
  }
}