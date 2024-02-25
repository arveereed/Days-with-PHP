<?php
  // var_dump($_SERVER["REQUEST_METHOD"]);

  if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $firstname = htmlspecialchars($_POST["firstname"]);
    $lastname = htmlspecialchars($_POST['lastname']);
    $favouritepet = htmlspecialchars($_POST["favouritepet"]);
    
    if ($firstname == '' || $lastname == '') {
      header('Location: ../index.php');
    }

    echo "These are the data, that the user submitted<br>";
    echo "$firstname <br>";
    echo "$lastname  <br>";
    echo "$favouritepet  <br>";

 
  } else {
    header('Location: ../index.php');
  }


