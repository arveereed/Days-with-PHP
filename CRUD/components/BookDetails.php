<header class='d-flex justify-content-between my-4'>
  <h1>Book Details</h1>
  <div>
    <a href="" class='btn btn-primary'>Back</a>
  </div>
</header>

<div class="book-details my-4 ">
  <?php
  if (isset($_GET['id'])) {
    require_once '../inc/dbh.inc.php';
    require_once '../models/renderbook.php';

    $row = get_row($pdo);
  } 
  ?>
  <h2>Title</h2>
  <p><?php echo $row['Title']; ?></p>
  <h2>Author</h2>
  <p><?php echo $row['Author']; ?></p>
  <h2>Description</h2>
  <p><?php echo $row['Book_Description']; ?></p>
  <h2>Type</h2>
  <p><?php echo $row['Book_Type']; ?></p>
</div>