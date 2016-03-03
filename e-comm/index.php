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
    <?php require_once('includes/navbar.php');?>

    <div class="container">
      <div class="starter-template">
        <h1>Login</h1>
        <p class="lead">Please Login or click Register to set up an account with us.<br></p>
      </div>
      <div>
<form action="loginpage.php" method="post">
          <input type="submit" value="Login">
        </form>
      </div>
      <br>
       <div>
<form action="includes/logout.php" method="post">
          <input type="submit" value="Logout">
        </form>
      </div>
       <div>
<form action="register.php" method="post">
          <input type="submit" value="Register">
        </form>
      </div>
      <br>
      <div>
        <br>
        <br>
        <?php
          if ($logged) {
            echo "You are logged in.";
            echo '<form method="POST" action="update.php">';
            echo '<input type="submit" value="Update User Info">';
            echo '</form>';
          
          } else {
            echo "You are logged out.";
          }
        ?>
      </div>
    </div><!-- /.container -->

    <?php require_once('includes/footer.php');?>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
