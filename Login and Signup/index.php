<?php
require_once "includes/config_session.inc.php";
require_once "includes/signup_view.inc.php";
require_once "includes/login_view.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- used to force CSS to reload in the page -->
    <link rel="stylesheet" href="css/main.css?v=<?php echo time(); ?>">

    <title>Document</title>
  </head>
  <body>

    <h3>
      <?php
      outputUsername();
      ?>
    </h3>

    <?php
      if (!isset($_SESSION["user_id"])) { ?>
        <h2>Login</h2>
        <form action="includes/login.inc.php" method="post">
          <input type="text" name="username" placeholder="Username">
          <input type="password" name="pwd" placeholder="Password">
          <button>Login</button>
        </form>
    <?php
      }
    ?>

    <?php
    checkLoginErrors();
    ?>

    <h2>Sign Up</h2>
    <form action="includes/signup.inc.php" method="post">
      <?php
      signupInputs();
      ?>
      <button>Signup</button>
    </form>

    <?php
    checkSignupErrors();
    ?>
    <?php
    if (isset($_SESSION["user_id"])) { ?>
      <form action="includes/logout.inc.php" method="post">
        <button>Logout</button>
      </form>
    <?php
    }
    ?>
    
  </body>
</html>