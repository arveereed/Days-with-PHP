<?php

declare(strict_types=1);

function getUser(object $pdo, string $username) {
  $query = "SELECT * FROM tbl_users WHERE Username = :Username;";
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(":Username", $username);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC); 
  return $result;
}