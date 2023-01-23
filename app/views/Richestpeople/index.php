</head>

<?php //var_dump($data); 
?>

<body>
  <h3><?= $data['title']; ?></h3>

  <table>
    <thead>
      <th>id</th>
      <th>Naam</th>
      <th>Leeftijd</th>
      <th>Net worth</th>
      <th>Mijn bedrijf</th>
    </thead>
    <tbody>
      <?php foreach ($data['records'] as $record) : ?>
      <tr>
        <td><?= $record->id; ?></td>
        <td><?= $record->Name; ?></td>
        <td><?= $record->Age; ?></td>
        <td><?= $record->Nethworth; ?></td>
        <td><?= $record->MyCompany; ?></td>
        <td><a href="<?= URLROOT; ?>/RichestPeoples/delete/<?= $record->id; ?>">Delete</a></td>
      </tr>
      <?php endforeach; ?>
      <tr>
        <form action="/RichestPeoples/create" method="POST">
          <td></td>
          <td><input type="text" name="Name" placeholder="name"></td>
          <td><input type="text" name="Age" placeholder="age"></td>
          <td><input type="text" name="Nethworth" placeholder="networth"></td>
          <td><input type="text" name="MyCompany" placeholder="mycompany"></td>
          <td><input type="submit" value="Create"></td>
        </form>
      </tr>
    </tbody>
  </table>
  <a href="<?= URLROOT; ?>/landingpages/index">Terug</a>
</body>

</html>