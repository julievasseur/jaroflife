<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styleJOL.css">
    <title>Ma todo list</title>
  </head>
  <body>

    <form method="post" action="">
      <div>
        <label>
          titre :
          <input type="text" name="title" value="">
        </label>
      </div>
      <div>
        <label>
          description :
          <textarea name="description"></textarea>
        </label>
      </div>
      <div>
        <label>
          utilisateur :
          <input type="text" name="userid" value="">
        </label>
      </div>
      <div>
        <input type="submit" value="ENVOYER" >
      </div>
    </form>
    

    <ul>
      <li><a href="./index.php">Retour à l'index</a></li>
    </ul>

<?php


    
      if (isset($_POST['title'], $_POST['description'])) {
        $sql = 
          'INSERT INTO todos (title, description, id)' .
          'VALUES (:title, :description, :userid)';

        require __DIR__.'/create-pdo.php';

        if (
          $pdo_statement &&
          $pdo_statement->bindParam(':title', $_POST['title']) &&
          $pdo_statement->bindParam(':description', $_POST['description']) &&
          $pdo_statement->bindParam(':userid', $_POST['userid']) &&
          $pdo_statement->execute()
        ) {
          echo '<body onLoad="alert(\'&#x1f44d Tâche ajoutée !\')">';
          header('Location:index.php');
          exit;
        }
      }

      
    ?>

  </body>
</html>
