<?php

function isInputEmpty(string $username, string $pwd) {
  return empty($username) || empty($pwd);
}

function isUsernameWrong(bool|array $result) {
  return !$result;
}

function isPasswordWrong(string $pwd, string $hashedPwd) {
  return !password_verify($pwd, $hashedPwd);
}