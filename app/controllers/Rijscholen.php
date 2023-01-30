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
      $rows .= "<td><a href='" . URLROOT . "/rijscholen/detail/$instructeur->Id'><img src='" . URLROOT . "/img/b_help.png' alt='topic'></a></td>";
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

  public function detail($id)
  {
    $instructeur = $this->rijschoolModel->getInstructeurById($id);
    $voertuigen = $this->rijschoolModel->getVehiclesByInstructeurId($id);

    $rows = "";
    foreach ($voertuigen as $voertuig) {
      $rows .= "<tr>";
      $rows .= "<td>" . $voertuig->TypeVoertuig . "</td>";
      $rows .= "<td>" . $voertuig->Type . "</td>";
      $rows .= "<td>" . $voertuig->Kenteken . "</td>";
      $rows .= "<td>" . $voertuig->Bouwjaar . "</td>";
      $rows .= "<td>" . $voertuig->Brandstof . "</td>";
      $rows .= "<td>" . $voertuig->Rijbewijscategorie . "</td>";
      $rows .= "<tr>";
    }

    $data = [
      'title' => 'Door instructeur gebruikte voertuigen',
      'voornaam' => $instructeur->Voornaam,
      'tussenvoegsel' => $instructeur->Tussenvoegsel,
      'achternaam' => $instructeur->Achternaam,
      'datumindienst' => $instructeur->DatumInDienst,
      'aantalsterren' => $instructeur->AantalSterren,
      'InstructeurId' => $instructeur->Id,
      'rows' => $rows
    ];

    $this->view('rijschool/detail', $data);
  }

  public function addVoertuig($id)
  {
    $instructeur = $this->rijschoolModel->getInstructeurById($id);
    var_dump($instructeur);

    $data = [
      'title' => 'Alle beschikbare voertuigen',
      'voornaam' => $instructeur->Voornaam,
      'tussenvoegsel' => $instructeur->Tussenvoegsel,
      'achternaam' => $instructeur->Achternaam,
      'datumindienst' => $instructeur->DatumInDienst,
      'aantalsterren' => $instructeur->AantalSterren,
    ];

    $this->view('rijschool/addVoertuig', $data);
  }
}