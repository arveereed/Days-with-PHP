<?php

declare(strict_types = 1);

function edit(object $pdo, string $title, string $author, string $type, string $desc, string $id) {
  $query = 'UPDATE tbl_books SET Title = :title, Author = :author, Book_Type = :Book_type, Book_Description = :book_desc WHERE Book_ID = :id;';
  $stmt = $pdo->prepare($query);

  $stmt->bindParam(':title', $title);
  $stmt->bindParam(':author', $author);
  $stmt->bindParam(':Book_type', $type);
  $stmt->bindParam(':book_desc', $desc);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
}