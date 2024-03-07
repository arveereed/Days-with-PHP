<?php

declare(strict_types=1);

function getUsername(object $pdo, string $username) {
  $query = "SELECT Username FROM tbl_users WHERE Username = :Username;";
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(":Username", $username);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC); 
  return $result;
}

function getEmail(object $pdo, string $email) {
  $query = "SELECT Email FROM tbl_users WHERE Email = :Email;";
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(":Email", $email);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC); 
  return $result;
}

function setUser(object $pdo, string $username, string $pwd, string $email) {
  $query = "INSERT INTO tbl_users (Username, Pwd, Email) VALUES (:Username, :Pwd, :Email)";
  $stmt = $pdo->prepare($query);

  $options = [
    'cost'=> 12
  ];
  $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

  $stmt->bindParam(":Username", $username);
  $stmt->bindParam(":Pwd", $hashedPwd);
  $stmt->bindParam(":Email", $email);
  $stmt->execute();
}