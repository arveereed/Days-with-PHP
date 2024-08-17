<?php

declare(strict_types=1); // set strict types to True

function get_data(object $pdo) {
  $query = 'SELECT * FROM tbl_books;';
  $stmt = $pdo->prepare($query);
  $stmt->execute();

  return $stmt;
}

function get_row(object $pdo) {
  $query = 'SELECT * FROM tbl_books WHERE Book_ID = :Book_ID';
  $stmt = $pdo->prepare($query);

  $stmt->bindParam(':Book_ID', $_GET['id']);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  return $result;
}