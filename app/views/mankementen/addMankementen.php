<?php require(APPROOT . '/views/includes/header.php') ?>
<h3><?= $data['title'] ?></h3>

<h4>Fype: Ferrari<br>
  Kenteken: TH-78-KL</h4>
<form action="<?= URLROOT ?>/mankementen/addMankementen" method="post">
  <p>
    <?= $data['MankementenErrors'] ?>
  </p>
  <label>Mankementen
    <input type="text" name="Mankementen">
  </label><br>
  <br>
  <input type="submit" value="Toevoegen">
</form>
<?php require(APPROOT . '/views/includes/footer.php') ?>