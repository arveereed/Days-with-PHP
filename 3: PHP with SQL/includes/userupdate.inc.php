<?php

/* used to check if the user is actually sumitted 
   the form using a post method */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $pwd = $_POST['pwd'];
  $email = $_POST['email'];

  try {
    require_once "dbh.inc.php";

    $query = "UPDATE tbl_users SET Username = :Username, Pwd = :Pwd, Email = :Email WHERE User_ID = 5;";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':Username', $username);
    $stmt->bindParam(':Pwd', $pwd);
    $stmt->bindParam(':Email', $email);

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
