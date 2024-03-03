<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- used to force CSS to reload in the page -->
    <link rel="stylesheet" href="css/main.css?v=<?php echo time(); ?>">
    
    <title>Connect database</title>
  </head>
  <body>
    <div class="container">
      <div>
        <h2>Sign Up</h2>
        <form action="includes/formhandler.inc.php" method="post">
          <input type="text" name="username" placeholder="Username">
          <input type="password" name="pwd" placeholder="Password">
          <input type="text" name="email" placeholder="E-mail">
          <button>Signup</button>
        </form>
      </div>

      <div>
        <h2>Change Account</h2>
        <form action="includes/userupdate.inc.php" method="post">
          <input type="text" name="username" placeholder="Username">
          <input type="password" name="pwd" placeholder="Password">
          <input type="text" name="email" placeholder="E-mail">
          <button>Update</button>
        </form>
      </div>

      <div>
        <h2>Delete Account</h2>
        <form action="includes/userdelete.inc.php" method="post">
          <input type="text" name="username" placeholder="Username">
          <input type="password" name="pwd" placeholder="Password">
          <button>Delete</button>
        </form>
      </div>
    </div>
    
    <form class="search-form" action="search.php" method="post">
      <label for="search">Search for user:</label>
      <input type="text" id="search" name="usersearch" placeholder="Search...">
      <button>Search</button>
    </form>
  </body>
</html>
