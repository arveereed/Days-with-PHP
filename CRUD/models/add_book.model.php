<?php

declare(strict_types=1);

function add_book(object $pdo, string $title, string $author, string $type, string $desc) {
  $query = 'INSERT INTO tbl_books(Title, Author, Book_Type, Book_Description)  VALUES(:title, :author, :Book_type, :book_desc);';
  $stmt = $pdo->prepare($query);

  $stmt->bindParam(':title', $title);
  $stmt->bindParam(':author', $author);
  $stmt->bindParam(':Book_type', $type);
  $stmt->bindParam(':book_desc', $desc);
  $stmt->execute();
}