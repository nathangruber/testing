<?php require_once('includes/session.php');?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--   <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">   -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <title>Blake's Board Shop</title>
  </head>
  <body>

  <?php 
    require_once('includes/navbar.php');
    require_once('includes/database.php');
    error_reporting(E_ALL);
  ?>

  <div class="container">
    <div class="row">
      <h3>Update User Information</h3>
    </div>
    <div class="row">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            <th>Birthdate</th>
            <th>Gender</th>
            <th>Phone Number</th>
            <th>Email Address</th>
            <th>Username</th>
            <th>Password</th>
            <th>Button</th>
            <th>Button</th>
          </tr>
        </thead>
        <tbody>
          <?php
            // include '../database.php';   --already required above
          if($logged) {
              $pdo = Database::connect();
              $username = $_POST['username'];
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = 'SELECT * FROM customer WHERE username = ?';
              $q = $pdo->prepare($sql);
              $q->execute(array($username));
              $query = $q->fetch(PDO::FETCH_ASSOC);

echo '<tr>';
echo '<form method="POST" action="userUpdate.php">';
echo '<input type="hidden" name="id" value="' . $query['id'] . '">';
echo '<td><input type="text" name="birth_date" value="'.$query['birth_date'].'"></td>';
echo '<td><input type="text" name="phone_number" value="'.$query['phone_number'].'"></td>';
echo '<td><input type="text" name="email_address" value="'.$query['email_address'].'"></td>';
echo '<td><input type="text" name="username" value="'.$query['username'].'"></td>';
echo '<td>***</td>';
echo '<td><input type="submit" value="Update"></td>';
echo '</form>';
echo '<form method="POST" action="userDelete.php">';
echo '<input type="hidden" name="id" value="' . $query['id'] . '">';
echo '<td><input type="submit" value="Delete"></td>';
echo '</form>';
echo '</tr>';
                
  }
        
Database::disconnect();
}
          ?>
        </tbody>
      </table>
    </div>
    <div>
      <a href="index.php">Return to Index</a>
    </div>
  </div> <!-- /container -->

  <?php require_once('includes/footer.php');?>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  </body>
  </html>
</html>