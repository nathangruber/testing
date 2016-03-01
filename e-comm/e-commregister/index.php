<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">       
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>Register</h3>
            </div>
            <div class="row">
              <p>
                    <a href="create.php" class="btn btn-success">Create</a>
                </p>
                

                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Your Full Name</th>
                      <th>Email Address</th>
                      <th>Username</th>
                      <th>Password</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   require_once '../database.php';
                   //require_once '../navbar.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM register ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['your_full_name'] . '</td>';
                            echo '<td>'. $row['email_address'] . '</td>';
                            echo '<td>'. $row['username'] . '</td>';
                            echo '<td>'. $row['password'] . '</td>';
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
//require_once '../footer.php';
?>