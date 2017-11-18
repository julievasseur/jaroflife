<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Todo list</title>
    <link rel="stylesheet" type="text/css" href="styleJOL.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  </head>
  <body>

    <h1 class="todotitle"><img src="http://static.adweek.com/adweek.com-prod/wp-content/uploads/sites/2/2016/04/twitter-list.jpg" alt="list" width="40" height="auto">  Todo list</h1>
    <ul class="todolist">
    <?php
      $sql = 'SELECT * FROM todos WHERE deleted_at IS NULL';
      $todos = [];

      require __DIR__.'/create-pdo.php';

      if ($pdo_statement && $pdo_statement->execute()) {
        $todos = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
      }

      foreach ($todos as $todo) {
    ?>
      <li>
        <a href="read.php?id=<?php echo $todo['id']; ?>">
          <?php echo $todo['title']; ?>
        </a>
      </li>

    <?php
      }
    ?>
      <br>
      <p><a href="add.php">&#9758 Ajouter une tâche...</a></p>
      <p><a href="logoutJOL.php"><em>Déconnexion</em></a></p>
    </ul>
  </body>
</html>
