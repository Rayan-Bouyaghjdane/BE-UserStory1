<?php require(APPROOT . '/views/includes/header.php'); ?>
<h3><?= $data['title'] ?></h3>

<form action="<?= URLROOT ?>/lessen/addOpmerking" method="post">
  <label for="opmerking">Opmerking</label><br>
  <input type="text" name="opmerking" id="opmerking"><br>
  <br>
  <input type="hidden" name="lesId" value="<?= $data['lesId'] ?>">
  <input type="submit" value="Toevoegen">
</form>
<?php require(APPROOT . '/views/includes/footer.php'); ?>