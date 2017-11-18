<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styleJOL.css">
    <title>Modifier...</title>
  </head>
  <body>
    <?php
      $todo = null;

      if (isset($_GET['id'])) {
        if (isset($_POST['title'], $_POST['description'])) {
          $sql = 
            'UPDATE todos ' .
            'SET title=:title, description=:description ' .
            'WHERE id=:id';

          require __DIR__.'/create-pdo.php';

          if (
            $pdo_statement &&
            $pdo_statement->bindParam(':id', $_GET['id'], PDO::PARAM_INT) &&
            $pdo_statement->bindParam(':title', $_POST['title']) &&
            $pdo_statement->bindParam(':description', $_POST['description']) &&
            $pdo_statement->execute()
          ) {
            echo '<body onLoad="alert(\'&#x1f44d Tâche modifiée !\')">';
        
            header('Location:read.php?id=' . $_GET['id']);
            
            exit;
          }
        } else {
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
    <form action="" method="post">
      <div>
        <label>
          titre :
          <input type="text" name="title" value="<?php echo $todo['title']; ?>">
        </label>
      </div>
      <div>
        <label>
          description :
          <textarea name="description"><?php echo $todo['description']; ?></textarea>
        </label>
      </div>
      <div>
        <input type="submit" value="ENVOYER">
      </div>
    </form>
    <?php
          }
        }
      }
    ?>
    <ul>
      <?php
        if ($todo) {
      ?>
      <li><a href="read.php?id=<?php echo $todo['id']; ?>">annuler</a></li>
      <?php
        }


      ?>
      <li><a href="index.php">Retour à l'index</a></li>
    </ul>
  </body>
</html>
