<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--   <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">   -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <title>Login</title>
 </head>
  
  <body>
    <?php require_once('includes/navbar.php');?>

    
    <div class="container">
      <div class="starter-template">
        <h1>Login</h1>
        <p class="lead">Enter Username and Password to login.<br></p>
      </div>
      <div>
        <form action="includes/login.php" method="post">
          <input type="text" name="user_name" placeholder="user_name">
          <input type="text" name="password" placeholder="password">
          <input type="submit" value="Login">        
        </form>
      </div>
      <div>
      	<p>No Account? Register below</p>
      </div>
      <div>
        <form action="register.php" method="post">
          <input type="submit" value="Register">
        </form>
      </div>
    </div>

    <?php require_once('includes/footer.php');?>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

  </body>
</html>