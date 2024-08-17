<?php
if ($_SERVER['REQUEST_METHOD'] === "POST"){
  $title = $_POST['title'];
  $author = $_POST['author'];
  $type = $_POST['type'];
  $desc = $_POST['description'];
  $id = $_POST['id'];
  
  try {
    require_once './dbh.inc.php';
    require_once '../models/edit_book.model.php';

    edit($pdo, $title, $author, $type, $desc, $id);
    header('Location: ../index.php?edit=success');
    
    $pdo = null;
    $stmt = null;
    die();
  } catch (PDOException $e) {
    die('Query Failed: ' . $e->getMessage());
  }

} else {
  header('Location: ../index.php');
  die();
}