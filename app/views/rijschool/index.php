<?php require(APPROOT . '/views/includes/header.php'); ?>


<h3><?= $data['title'] ?></h3>

<h5>Aantal instructeurs: <?= $data['aantalInstructeurs'] ?></h5>

<table border='1'>
  <thead>
    <th>Voornaam</th>
    <th>Tussenvoegsel</th>
    <th>Achternaam</th>
    <th>Mobiel</th>
    <th>Datum in dienst</th>
    <th>Aantal sterren</th>
    <th>Voertuig</th>
  </thead>
  <tbody>
    <?= $data['rows'] ?>
  </tbody>
</table>

<?php require(APPROOT . '/views/includes/header.php'); ?>