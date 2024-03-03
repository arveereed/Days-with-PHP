<?php

/* used to check if the user is actually sumitted 
   the form using a post method */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $pwd = $_POST['pwd'];
  $email = $_POST['email'];

  try {
    require_once "dbh.inc.php";

    $query = "INSERT INTO tbl_users(Username, Pwd, Email) VALUES(?, ?, ?);";

    $stmt = $pdo->prepare($query);

    $stmt->execute([$username, $pwd, $email]);

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
