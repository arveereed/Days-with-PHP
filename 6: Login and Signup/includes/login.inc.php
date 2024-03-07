<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST["username"];
  $pwd = $_POST["pwd"];

  try {
    require_once "dbh.inc.php";
    require_once "login_model.inc.php";
    require_once "login_control.inc.php";
    
    // ERROR HANDLERS
    $errors = [];
    if (isInputEmpty($username, $pwd)) {
      $errors["empty_input"] = "Fill in all fields!";
    }

    $result = getUser($pdo, $username);
    if (isUsernameWrong($result)) {
      $errors["login_incorrect"] = "Incorrect login info!";
    }
    if (!isUsernameWrong($result) && isPasswordWrong($pwd, $result["Pwd"])) {
      $errors["login_incorrect"] = "Incorrect login info!";
    }

    require_once "config_session.inc.php";

    if ($errors) {
      $_SESSION["errors_login"] = $errors;

      header("Location: ../index.php");
      die();
    }

    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $result["User_ID"];
    session_id($sessionId);

    $_SESSION["user_id"] = $result["User_ID"];
    $_SESSION["user_username"] = htmlspecialchars($result["Username"]);

    $_SESSION['last_regeneration'] = time();

    header("Location: ../index.php?login=success");
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