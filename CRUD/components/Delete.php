<?php

if (isset($_GET['id'])) {
  require_once '../inc/dbh.inc.php';
  require_once '../models/deletebook.php';

  delete_book($pdo, $id = $_GET['id']);
  header('Location: ../index.php?delete=success');
}  