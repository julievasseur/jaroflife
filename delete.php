
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="styleJOL.css">
</head>
<body>


  <?php

  if (isset($_GET['id'])) {
    $sql = 
      'UPDATE todos ' .
      'SET deleted_at=CURRENT_TIMESTAMP() ' .
      'WHERE id=:id';

    require __DIR__.'/create-pdo.php';

    if (
      !$pdo_statement ||
      !$pdo_statement->bindParam(':id', $_GET['id'], PDO::PARAM_INT) ||
      !$pdo_statement->execute()
    ) {
      header('Location:./read.php?id=' . $_GET['id']);
      exit;
    }
  }

  header('Location:index.php');
  ?>


</body>
</html>


