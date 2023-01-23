<?php

class landingpages extends Controller
{
  public function __construct()
  {
  }

  public function index()
  {
    $data = [
      'title' => 'Richest People',
      'Homepage MVC OOP Framework'
    ];
    $this->View('landingpages/index', $data);
  }
}