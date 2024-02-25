<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/main.css?v=<?php echo time(); ?>">
  <title>Form</title>
</head>
<body>
  <main class="wrapper-main">
    <form action="includes/formhandler.php" method="post">
      <label for="firstname">First Name</label>
      <input type="text" id="firstname" name="firstname" placeholder="First name">

      <label for="lastname">Last Name</label>
      <input type="text" id="lastname" name="lastname" placeholder="Last name">
      
      <label for="favouritepet">Favourite Pet?</label>
      <select name="favouritepet" id="favouritepet">
        <option value="none">None</option>
        <option value="dog">Dog</option>
        <option value="cat">Cat</option>
        <option value="bird">Bird</option>
      </select>

      <button type="submit">SUBMIT</button>
    </form>
  </main>

</body>
</html>