<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">       
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>Product</h3>
            </div>
            <div class="row">
              <p>
                    <a href="create.php" class="btn btn-success">Create</a>
                </p>
                

                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th>Category</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   require_once '../database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM product ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                             echo '<tr>';
                             echo '<td>'. $row['id'] . '</td>';
                             echo '<td>'. $row['name'] . '</td>';
                             echo '<td>'. $row['description'] . '</td>';
                             echo '<td>'. $row['price'] . '</td>';
                             echo '<td>'. $row['category_fk'] . '</td>';
                             echo '<td width=250>';
                             echo '<a class="btn" href="read.php?id='.$row['id'].'">Read</a>';
                             echo ' ';
                             echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
                             echo ' ';
                             echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
                             echo '</td>';
                             echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>