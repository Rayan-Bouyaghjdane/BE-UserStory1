<?php require(APPROOT . '/views/includes/header.php'); ?>


<h3><?= $data['title'] ?></h3>

<h5><?= 'InstructurNaam' . $data['instructeurNaam'];  ?></h5>

<table border='1'>
  <thead>
    <th>Datum</th>
    <th>Tijd</th>
    <th>Naam Leerling</th>
    <th>Les info</th>
    <th>Onderwerp</th>
  </thead>
  <tbody>
    <?= $data['rows'] ?>
  </tbody>
</table>

<?php require(APPROOT . '/views/includes/header.php'); ?>