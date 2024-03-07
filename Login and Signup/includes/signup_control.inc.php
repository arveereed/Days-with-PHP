<?php

declare(strict_types = 1);

function isInputEmpty(string $username, string $pwd, string $email) {
  if (empty($username) || empty($pwd) || empty($email)) {
    return true;
  } else {
    return false;
  }
}

function isEmailInvalid(string $email) {
  return !filter_var($email, FILTER_VALIDATE_EMAIL);
}

function isUsernameTaken(object $pdo, string $username) {
  return getUsername($pdo, $username);
}

function isEmailRegistered(object $pdo, string $email) {
  return getEmail($pdo, $email);
}

function createUser(object $pdo, string $username, string $pwd, string $email) {
  setUser($pdo, $username, $pwd, $email);
}