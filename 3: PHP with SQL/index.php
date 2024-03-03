<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css?v=<?php echo time(); ?>">
    <title>Connect database</title>
  </head>
  <body>
    <h3>Sign Up</h3>
    <form action="includes/formhandler.inc.php" method="post">
      <input type="text" name="username" placeholder="Username">
      <input type="password" name="pwd" placeholder="Password">
      <input type="text" name="email" placeholder="E-mail">
      <button>Signup</button>
    </form>on></button>
    </form>

    <h3>Change Account</h3>
    <form action="includes/userupdate.inc.php" method="post">
      <input type="text" name="username" placeholder="Username">
      <input type="password" name="pwd" placeholder="Password">
      <input type="text" name="email" placeholder="E-mail">
      <button>Update</button>
    </form>

    <h3>Delete Account</h3>
    <form action="includes/userdelete.inc.php" method="post">
      <input type="text" name="username" placeholder="Username">
      <input type="password" name="pwd" placeholder="Password">
      <button>Delete</button>
    </form>
  </body>
</html>
