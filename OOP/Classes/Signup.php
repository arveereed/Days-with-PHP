<?php

class Signup extends Dbh 
{

  private $username;
  private $pwd;

  public function __construct($username, $pwd) 
  {
    $this->username = $username;
    $this->pwd = $pwd;
  }

  private function insert_user() {
    $query = "INSERT INTO tbl_users(Username, Pwd) VALUES(:Username, :Pwd);";
    $stmt = $this->connect()->prepare($query);

    $stmt->bindParam(":Username", $this->username);
    $stmt->bindParam(":Pwd", $this->pwd);
    $stmt->execute();
  }

  private function is_empty_submit() {
    return empty($this->username) && empty($this->pwd);
  }

  public function signup_user() {
    // error handlers
    if ($this->is_empty_submit()) {
      header("Location: ../index.php");
      die();
    }

    // if no errors, signup user
    $this->insert_user();
  }
}