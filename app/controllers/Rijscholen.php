<?php

class Rijscholen extends Controller
{

  private $rijschoolModel;

  public function __construct()
  {
    $this->rijschoolModel = $this->modal('Rijschool');
  }

  public function index()
  {
    $instructeurs = $this->rijschoolModel->getInstructeurs();

    $rows = "";
    foreach ($instructeurs as $instructeur) {
      $rows .= "<tr>";
      $rows .= "<td>" . $instructeur->Voornaam . "</td>";
      $rows .= "<td>" . $instructeur->Tussenvoegsel . "</td>";
      $rows .= "<td>" . $instructeur->Achternaam . "</td>";
      $rows .= "<td>" . $instructeur->Mobiel . "</td>";
      $rows .= "<td>" . $instructeur->DatumInDienst . "</td>";
      $rows .= "<td>" . $instructeur->AantalSterren . "</td>";
      $rows .= "<td><a href='" . URLROOT . "/rijschool/detail'><img src='" . URLROOT . "/img/b_help.png' alt='topic'></a></td>";
      $rows .= "</tr>";
    }

    $data = [
      'title' => 'Rijscholen',
      'instructeurNaam' => $this->rijschoolModel->getInstructeurs(),
      'rows' => $rows,
      'aantalInstructeurs' => count($instructeurs)
    ];

    $this->view('rijschool/index', $data);
  }
}