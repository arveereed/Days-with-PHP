<?php

declare(strict_types=1);

function delete_book(object $pdo, string $id) {
  $query = "DELETE FROM tbl_books WHERE Book_ID = :id";
  $stmt = $pdo->prepare($query);

  $stmt->bindParam(':id', $id);
  $stmt->execute();
}