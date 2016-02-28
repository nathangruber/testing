<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">       <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>Address</h3>
            </div>
            <div class="row">
              <p>
                    <a href="create.php" class="btn btn-success">Create</a>
                </p>
                

                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Street Address</th>
                      <th>Street Address</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Zip Code</th>
                      <th>Country</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   require '../database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM address ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['name'] . '</td>';
                            echo '<td>'. $row['street_1'] . '</td>';
                            echo '<td>'. $row['street_2'] . '</td>';
                            echo '<td>'. $row['city'] . '</td>';
                            echo '<td>'. $row['state'] . '</td>';
			                      echo '<td>'. $row['zip_code'].'</td>'; 	
                            echo '<td>'. $row['country'] . '</td>';
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
<?php
require_once '../footer.php';
?>