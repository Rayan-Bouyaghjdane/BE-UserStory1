<?php

class Mankementen extends Controller
{

  private $mankementenModel;


  public function __construct()
  {
    $this->mankementenModel = $this->modal('Mankement');
  }

  public function index()
  {
    $result = $this->mankementenModel->getMankement();
    // if ($result) {
    //   $instructeurNaam = $result[0]->INNA;
    // } else {
    //   $instructeurNaam = '';
    // }
    // var_dump($result);

    $rows = '';
    $first = '';

    foreach ($result as $info) {
      $rows .= "<tr>
        <td>$info->Datum</td>
        <td>$info->Mankement</td>
      </tr>";
      $first = "Auto van instructeur: $info->INNA <br>
      Email: $info->EM <br>
      Kenteken: $info->AK <br>
      Type: $info->AT <br>
      <br>";
    }

    $data = [
      'title' => "Overzicht Mankementen",
      'rows' => $rows,
      'first' => $first,
    ];
    $this->View('mankementen/index', $data);
  }

  public function addMankementen($instructeurId = 2)
  {
    $data = [
      'title' => 'Invoegen Mankementen',
      'instructeurId' => $instructeurId,
      'MankementenErrors' => ''
    ];


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

      $data = [
        'title' => 'Invoegen Mankementen',
        'instructeurId' => $instructeurId,
        'MankementenErrors' => '',
      ];

      if (!isset($_POST['Mankementen'])) {
        $data['MankementenErrors'] = "Voer een makement in";
        $this->view('mankementen/addMankementen', $data);
        exit;
      }

      if (strlen($_POST['Mankementen']) > 50) {
        $data['MankementenErrors'] = "Mankementen mag niet langer zijn dan 50 karakters";
        $this->view('mankementen/addMankementen', $data);
        exit;
      }

      try {
        $result = $this->mankementenModel->addMankement($_POST);
        if ($result) {
          echo "<p>De nieuwe Mankementen is toegevoegd</p>";
        } else {
          echo "<p>De nieuwe Mankementen is niet toegevoegd. Probeer het opnieuw</p>";
        }
      } catch (PDOException $e) {
        echo $e->getMessage();
      } finally {
        header('Refresh:5; url=' . URLROOT . '/mankementen');
      }
    }
    $this->view('mankementen/addMankementen', $data);
  }
}