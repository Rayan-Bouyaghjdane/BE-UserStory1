<?php require(APPROOT . '/views/includes/header.php') ?>
<h2> <?= $data['title'] ?></h3> <br>
  <h4><?= $data['first'] ?></h4> <br>
  <table border="1">
    <thead>
      <th>Datum</th>
      <th>Mankement</th>
    </thead>
    <tbody>
      <?php echo $data['rows'] ?>
    </tbody>
  </table>
  <button><a href='mankementen/addMankementen/2'>Mankement Toevoegen</a></button>
  <?php require(APPROOT . '/views/includes/footer.php') ?>