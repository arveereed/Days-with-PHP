<?php
/* used to check if the user is actually sumitted 
   the form using a post method */
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userSearch = $_POST['usersearch'];
  
    try {
      require_once "includes/dbh.inc.php";
  
      $query = "SELECT * FROM tbl_comments WHERE Username = :Username;";
  
      $stmt = $pdo->prepare($query);
  
      $stmt->bindParam(':Username', $userSearch);
  
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
      $pdo = null;
      $stmt = null;
    } catch (PDOException $e) {
      die('Query failed: ' . $e->getMessage());
    }
    
  } else {
    header('Location: index.php');
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- used to force CSS to reload in the page -->
    <link rel="stylesheet" href="css/main.css?v=<?php echo time(); ?>">

    <title>Search Page</title>
  </head>
  <body>
    <h3>Search results:</h3>

    <?php
    if (!empty($results)) {
      foreach ($results as $result) {
        echo htmlspecialchars($result['Username']) . '<br>' . htmlspecialchars($result['Comment_Text']) . '<br>' . htmlspecialchars($result['Created_at']);
      }
    } else {
      echo '<div>';
      echo '<p>There were no results!</p>';
      echo '</div>';
    }
    ?>
  </body>
</html>
