<?php

$sensitiveData = 'arveereed';
$salt = bin2hex(random_bytes(16)); // Generate random salt
$pepper = 'isArveeReallyCute'; // sample of unique string

$dataToHash = $sensitiveData . $salt . $pepper;
$hash = hash('sha256', $dataToHash);

/* ---- */

$sensitiveData = 'arveereed';

$storedSalt = $salt;
$storedHash = $hash;
$pepper = 'isArveeReallyCute';

$dataToHash = $sensitiveData . $storedSalt . $pepper;

$verificationHash = hash('sha256', $dataToHash);

echo $storedHash === $verificationHash ? 'true<br>' . $storedHash . '<br>' . $verificationHash: 'false';
