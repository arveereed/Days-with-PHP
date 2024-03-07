<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST["username"];
  $pwd = $_POST["pwd"];
  $email  = $_POST["email"];

  try {
    require_once "dbh.inc.php";
    require_once "signup_model.inc.php";
    require_once "signup_control.inc.php";

    // ERROR HANDLERS
    $errors = [];
    if (isInputEmpty($username, $pwd, $email)) {
      $errors["empty_input"] = "Fill in all fields!";
    }
    if (isEmailInvalid($email)) {
      $errors["invalid_email"] = "Invalid email used!";
    }
    if (isUsernameTaken($pdo, $username)) {
      $errors["username_taken"] = "Username already taken!";
    }
    if (isEmailRegistered($pdo, $email)) {
      $errors["email_used"] = "Email already registered!";
    }

    require_once "config_session.inc.php";

    if ($errors) {
      $_SESSION["errors_signup"] = $errors;

      $signupData = [
        "username" => $username,
        "email"=> $email
      ];
      $_SESSION["signup_data"] = $signupData;

      header("Location: ../index.php");
      die();
    }

    createUser($pdo, $username, $pwd, $email);
    header("Location: ../index.php?signup=success");

    $pdo = null;
    $stmt = null;

    die();
  } catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
  }
} else {
  header("Location: ../index.php");
  die();
}