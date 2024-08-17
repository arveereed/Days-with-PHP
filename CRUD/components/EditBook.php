<header class='d-flex justify-content-between my-4'>
  <h1>Edit Book</h1>
  <div>
    <a href="" class='btn btn-primary'>Back</a>
  </div>
</header>

<?php
if (isset($_GET['id'])) {
  require_once '../inc/dbh.inc.php';
  require_once '../models/renderbook.php';

  $row = get_row($pdo);
?>
  <form action="inc/edit.inc.php" method="post">
    <div class="form-element my-4">
      <input type="text" class="form-control" name='title' value='<?php echo $row['Title'] ?>' placeholder="Book Title: ">
    </div>
    <div class="form-element my-4">
      <input type="text" class="form-control" name='author' value='<?php echo $row['Author'] ?>' placeholder="Author Name: ">
    </div>
    <div class="form-element my-4">
      <select name="type" class="form-control">
        <option value="" <?php echo $row['Book_Type'] == "adventure" ? "selected" : "" ?>>Select Book Type</option>
        <option value="adventure" <?php echo $row['Book_Type'] == "adventure" ? "selected" : "" ?>>Adventure</option>
        <option value="fantasy" <?php echo $row['Book_Type'] == "fantasy" ? "selected" : "" ?>>Fantasy</option>
        <option value="scifi" <?php echo $row['Book_Type'] == "scifi" ? "selected" : "" ?>>Sci-Fi</option>
        <option value="horror" <?php echo $row['Book_Type'] == "horror" ? "selected" : "" ?>>Horror</option>
      </select>
    </div>
    <div class="form-element my-4">
      <input type="text" class="form-control" name="description" value='<?php echo $row['Book_Description'] ?>' placeholder='Book Description:'>
    </div>
    <input type="hidden" name="id" value="<?php echo $row["Book_ID"] ?>">
    <div class="form-element">
      <button class="btn btn-success">Save</button>
    </div>
  </form>
<?php
}