<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $author = $_POST['author'];
  $type = $_POST['type'];
  $desc = $_POST['description'];

  try {
    require_once './dbh.inc.php';
    require_once '../models/add_book.model.php';

    add_book($pdo, $title, $author, $type, $desc);
    header('Location: ../index.php?add=success');
    
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