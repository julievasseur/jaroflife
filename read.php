<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styleJOL.css">
    <title>Lire</title>
  </head>
  <body>
    <?php
      $todo = null;

      if (isset($_GET['id'])) {
        $sql = 'SELECT * FROM todos WHERE id=:id';

        require __DIR__.'/create-pdo.php';

        if (
          $pdo_statement &&
          $pdo_statement->bindParam(':id', $_GET['id'], PDO::PARAM_INT) &&
          $pdo_statement->execute()
        ) {
          $todo = $pdo_statement->fetch(PDO::FETCH_ASSOC);
        }

        if ($todo) {
    ?>
    <h1><?php echo $todo['title']; ?></h1>
    <p><?php echo $todo['description']; ?></p>
    <?php
        }
      }
    ?>
    <ul>
      <?php
        if ($todo) {
      ?>
      <li><a href="edit.php?id=<?php echo $todo['id']; ?>">modifier...</a></li>
      <li><a href="delete.php?id=<?php echo $todo['id']; ?>">supprimer</a></li>
      <?php
        }
      ?>
      <li><a href="index.php">retour à l'index</a></li>
    </ul>
  </body>
</html>
