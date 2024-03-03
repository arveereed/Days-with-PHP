<?php

/* used to check if the user is actually sumitted 
   the form using a post method */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $pwd = $_POST['pwd'];

  try {
    require_once "dbh.inc.php";

    $query = "DELETE FROM tbl_users WHERE Username = :Username AND Pwd = :Pwd;";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':Username', $username);
    $stmt->bindParam(':Pwd', $pwd);

    $stmt->execute();

    $pdo = null;
    $stmt = null;

    header('Location: ../index.php');

    die();
  } catch (PDOException $e) {
    die('Query failed: ' . $e->getMessage());
  }
  
} else {
  header('Location: ../index.php');
}
