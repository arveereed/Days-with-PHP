<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>CRUD</title>
    <style>
      .book-details {
        background-color: #f5f5f5;
        padding: 50px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <header class='d-flex justify-content-between my-4'>
        <h1>Book list</h1>
        <div>
          <a href="#" class='btn btn-primary' data-source='components/AddBook.php'>Add Book</a>
        </div>
      </header>

      <table class='table table-bordered'>
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Author</th>
            <th>Type</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          require_once 'inc/dbh.inc.php';
          require_once 'models/renderbook.php';
          
          $stmt = get_data($pdo);

          if ($stmt->rowCount() > 0) {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              echo "
              <tr>
                <td>" .$row['Book_ID'] . "</td>
                <td>" .$row['Title'] . "</td>
                <td>" .$row['Author'] . "</td>
                <td>" .$row['Book_Type'] . "</td>
                <td>
                  <a href='' class='btn btn-info' data-source='components/BookDetails.php?id=". $row['Book_ID'] ."'>Read more</a>
                  <a href='' class='btn btn-warning' data-source='components/EditBook.php?id=". $row['Book_ID'] ."'>Edit</a>
                  <a href='' class='btn btn-danger' data-source='components/Delete.php?id=". $row['Book_ID'] ."'>Delete</a>
                </td>
              </tr>
              ";
            }
          } else {
            echo 'there are no books';
          }
          ?>
        </tbody>
      </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function() {
        $('a').click(function() {
          let source = $(this).data("source");
          
          $(".container").load(source);
          
          return false; // prevent default browser refresh on "#" link
        });
      });
    </script>
  </body>
</html>