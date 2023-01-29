<?php require(APPROOT . '/views/includes/header.php'); ?>


<h3><?= $data['title'] ?></h3>

<h5>Naam: <?= $data['voornaam'] . ' ' . $data['tussenvoegsel'] . ' ' . $data['achternaam'] ?></h5>
<h5>Datum in dienst: <?= $data['datumindienst'] ?></h5>
<h5>Aantal sterren: <?= $data['aantalsterren'] ?></h5>

<table border='1'>
  <thead>
    <th>Type voertuig</th>
    <th>Type</th>
    <th>Kenteken</th>
    <th>Bouwjaar</th>
    <th>Brandstof</th>
    <th>Rijbewijscategorie</th>
  </thead>
  <tbody>
    <?= $data['rows'] ?>
  </tbody>
</table>

<?php require(APPROOT . '/views/includes/header.php'); ?>