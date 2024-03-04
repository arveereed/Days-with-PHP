<?php

/* generate Hash pwd */
$pwdSignup = "arveereed";

$options = [
  'cost' => 12,
];
$hashedPwd = password_hash($pwdSignup, PASSWORD_BCRYPT, $options);

$pwdLogin = "arveereed2";
password_verify($pwdLogin, $hashedPwd);

echo  password_verify($pwdLogin, $hashedPwd) ? 'true' : 'false';
