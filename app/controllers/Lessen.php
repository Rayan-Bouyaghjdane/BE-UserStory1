<?php

class Lessen extends Controller
{
  public function __construct()
  {
    $this->LesModel = $this->modal('Les');
  }

  public function index()
  {
    $result = $this->LesModel->getLessons();
    if ($result) {
      $instructeurNaam = $result[0]->INNA;
    } else {
      $instructeurNaam = '';
    }
    // var_dump($result);

    $rows = '';
    foreach ($result as $info) {
      $d = new DateTimeImmutable($info->Datum, new DateTimeZone('Europe/Amsterdam'));
      $rows .= "<tr>
      <td>{$d->format('d-m-Y')}</td>
      <td>{$d->format('H:i')}</td>
      <td>$info->LENA</td>
      <td><a href='" . URLROOT . "/lessen/opmerking/{$info->Id}'><img src='" . URLROOT . "/img/b_help.png' alt=''></a></td>
      <td><a href='" . URLROOT . "/lessen/topicslesson/{$info->Id}'><img src='" . URLROOT . "/img/b_index.png' alt=''></a></td>
    </tr>";
    }

    $data = [
      'title' => 'Overzicht Lessen',
      'rows' => $rows,
      'instructeurNaam' => $instructeurNaam
    ];
    $this->View('lessen/index', $data);
  }

  public function topicsLesson($lesId)
  {
    $result = $this->LesModel->getTopicsLesson($lesId);

    // var_dump($result);
    if ($result) {
      $d = new DateTimeImmutable($result[0]->Datum, new DateTimeZone('Europe/Amsterdam'));
      $date = $d->format('d-m-y');
      $time = $d->format('H:i');
    } else {
      $date = '';
      $time = '';
    }

    $rows = '';

    foreach ($result as $topic) {
      $rows .= "<tr>
              <td>$topic->Onderwerp</td>
              </tr>";
    }

    $data = [
      'title' => 'Onderwerpen Les',
      'rows' => $rows,
      'lesId' => $lesId,
      'date' => $date,
      'time' => $time
    ];

    $this->view('Lessen/topicsLesson', $data);
  }

  public function addTopic($lesId = NULL)
  {
    $data = [
      'title' => 'Onderwerp toevoegen',
      'lesId' => $lesId,
      'topicErrors' => ''
    ];


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // var_dump($_POST);
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

      $data = [
        'title' => 'Onderwerp toevoegen',
        'lesId' => $_POST['LesId'],
        'topic' => $_POST['topic'],
        'topicErrors' => '',
      ];

      if (empty($data['topicErrors'])) {
        $result = $this->LesModel->addTopic($_POST);
        if ($result) {
          echo "<p>Het nieuwe Onderwerp is successvol toegevoegd</p>";
        } else {
          echo "<p>Het nieuwe Onderwerp is niet toegevoegd</p>";
        }
        header('Refresh:5; url=' . URLROOT . '/lessen/index/');
      } else {
        header('refresh:3; url=' . URLROOT . '/lessen/addTopic/' . $data['lesId']);
      }
    }
    $this->view('lessen/addTopic', $data);
  }

  private function validateAddTopicForm($data)
  {
    if (strlen($data['topic']) > 255) {
      $data['topicErrors'] = 'Het nieuwe onderwerp mag niet langer zijn dan 255 tekens';
    } elseif (strlen($data['topic']) > 255) {
      $data['topicErrors'] = 'u bent vergeten het veld in te vullen';
    }

    return $data;
  }

  public function opmerking($lesId = NULL)
  {
    if (!$lesId) {
      header("Location:" . URLROOT . "/lessen/opmerking");
    }

    $les = $this->LesModel->opmerking($lesId);

    $rows = '';

    foreach ($les as $value) {
      $rows .= "<tr>
                  <td>$value->id</td>
                  <td>$value->Datum</td>
                  <td>$value->Naam</td>
                  <td>$value->Opmerking</td>
              </tr>";
    }

    $data = [
      'rows' => $rows,
      'lesId' => $lesId,
    ];
    $this->view('lessen/opmerking', $data);
  }

  public function addOpmerking($lesId = NULL)
  {
    $data = [
      'title' => 'Opmerking toevoegen',
      'lesId' => $lesId,
      'OpmerkingErrors' => ''
    ];


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // var_dump($_POST);
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

      $data = [
        'title' => 'Opmerking toevoegen',
        'lesId' => $_POST['lesId'],
        'opmerking' => $_POST['opmerking'],
        'opmerkingErrors' => '',
      ];

      if (empty($data['opmerkingErrors'])) {
        $result = $this->LesModel->addOpmerking($_POST);
        if ($result) {
          echo "<p>Het nieuwe opmerking is successvol toegevoegd</p>";
        } else {
          echo "<p>Het nieuwe opmerking is niet toegevoegd</p>";
        }
        header('Refresh:5; url=' . URLROOT . '/lessen/index/');
      } else {
        header('refresh:3; url=' . URLROOT . '/lessen/addOpmerking/' . $data['lesId']);
      }
    }
    $this->view('lessen/addOpmerking', $data);
  }
}