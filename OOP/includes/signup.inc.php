<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST["username"];
  $pwd = $_POST["pwd"];

  require_once "../Classes/Dbh.php";
  require_once "../Classes/Signup.php";

  $signup = new Signup($username, $pwd);
  $signup->signup_user();
} else {
  header("Location: ../index.php");
  die();
}