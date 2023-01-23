<?php

class RichestPeoples extends Controller
{
  public function __construct()
  {
    // setting model to controller
    $this->RichestPeople = $this->modal('RichestPeople');
  }

  public function index()
  {
    // Getting alle the poor people from database
    $records = $this->RichestPeople->getRichestPeople();

    // creating data to view
    $data = [
      'title' => 'Rijkste mensen van de wereld',
      'records' => $records
    ];

    // setting data to view
    $this->view('RichestPeople/index', $data);
  }

  // poorpeoples/delete
  public function delete($id = null)
  {
    // if it doesn't exist redirect to /poorpeoples
    if (!isset($id)) {
      header('Location: ' . URLROOT . '/RichestPeoples');
    }

    // deleting person from db with $id form url
    $this->RichestPeople->deleteRichestPeople($id);

    // creating data to view with messages and the id from the url
    $data = [
      'message' => 'Het record met id ' . $id .  ' is verwijderd',
    ];

    // setting data to the view
    $this->view('RichestPeople/message', $data);
  }

  // RichestPeoples/create
  public function create()
  {
    var_dump($_POST);

    // check if method is post or else redirect to /RichestPeoples
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
      header('Location: ' . URLROOT . '/RichestPeoples');
      return;
    }

    // inserting data into db
    $this->Richestpeople->createRichestPeople($_POST);

    // creating data to view with messages and the id from the url
    echo 'je wordt over 5 seconden terug gestuurd';
    header('Refresh: 5; URL=' . URLROOT . '/RichestPeoples');
  }
}