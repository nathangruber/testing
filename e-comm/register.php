<?php
    require_once 'includes/database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
      $nameError = null;
      $birth_dateError = null;
      $genderError = null;
      $phone_numberError = null;
      $email_addressError = null;
      $permissions = null;
      $usernameError = null;
      $passwordError = null;
         
        // keep track post values
      $name = $_POST['name'];
      $birth_date = $_POST['birth_date'];
      $gender = $_POST['gender'];
      $phone_number = $_POST['phone_number'];
      $email_address = $_POST['email_address'];
      $permissions = $_POST['permissions'];
      $username = $_POST['username'];
      $password = $_POST['password'];
         
        // validate input
      $valid = true;
        
      if (empty($name)) {
        $nameError = 'Please enter Name';
        $valid = false;
      }
      if (empty($birth_date)) {
        $birth_dateError = 'Please enter your Birth Date';
        $valid = false;
      }
      if (empty($phone_number)) {
        $phone_numberError = 'Please enter Phone Number';
        $valid = false;
      }
      if (empty($email_address)) {
        $email_addressError = 'Please enter Email Address';
        $valid = false;
      } else if ( !filter_var($email_address,FILTER_VALIDATE_EMAIL) ) {
        $email_addressError = 'Please Enter a valid Email Address';
        $valid = false;
      }
      if (empty($username)) {
        $usernameError = 'Please enter Username';
        $valid = false;
      }
      if (empty($password)) {
        $passwordError = 'Please enter Password';
        $valid = false;
      }
         
        // insert data
      if ($valid) {
        try {
          $pdo = Database::connect();
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "INSERT INTO customer (name,birth_date,phone_number,email_address,username,password) values(?, ?, ?, ?, ?, ?, ?)";
          $q = $pdo->prepare($sql);
          $q->execute(array($name,$birth_date,$phone_number,$email_address,$username,$password));
          Database::disconnect();
          header("Location: index.php");
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--   <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">   -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <title>Register</title>
 </head>
  
  <body>
    <?php require_once('includes/navbar.php');?>


    <div class="container">
      <div class="span10 offset1">
        <div class="row">
          <h3>Please Register.</h3>
        </div>           
        <form class="form-horizontal" action="register.php" method="post"> 

          <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
            <label class="control-label">Name</label>
            <div class="controls">
              <input name="name" type="text" placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
              <?php if (!empty($nameError)): ?>
                <span class="help-inline"><?php echo $nameError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($birth_dateError)?'error':'';?>">
            <label class="control-label">Birthdate</label>
            <div class="controls">
              <input name="birth_date" type="text" placeholder="Birthday" value="<?php echo !empty($birth_date)?$birth_date:'';?>">
              <?php if (!empty($birth_dateError)): ?>
                <span class="help-inline"><?php echo $birth_dateError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($phone_numberError)?'error':'';?>">
            <label class="control-label">Phone Number</label>
            <div class="controls">
              <input name="phone_number" type="text" placeholder="Phone Number" value="<?php echo !empty($phone_number)?$phone_number:'';?>">
              <?php if (!empty($phone_numberError)): ?>
                <span class="help-inline"><?php echo $phone_numberError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($email_addressError)?'error':'';?>">
            <label class="control-label">Email Address</label>
            <div class="controls">
              <input name="email_address" type="text" placeholder="Email Address" value="<?php echo !empty($email_address)?$email_address:'';?>">
              <?php if (!empty($email_addressError)): ?>
                <span class="help-inline"><?php echo $email_addressError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($usernameError)?'error':'';?>">
            <label class="control-label">Username</label>
            <div class="controls">
              <input name="username" type="text" placeholder="Username" value="<?php echo !empty($username)?$username:'';?>">
              <?php if (!empty($usernameError)): ?>
                <span class="help-inline"><?php echo $usernameError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($passwordError)?'error':'';?>">
            <label class="control-label">Password</label>
            <div class="controls">
              <input name="password" type="text" placeholder="Password" value="<?php echo !empty($password)?$password:'';?>">
              <?php if (!empty($passwordError)): ?>
                <span class="help-inline"><?php echo $passwordError;?></span>
              <?php endif;?>
            </div>
          </div>
                        
          <div class="form-actions">
            <button type="submit" class="btn btn-success">Register</button>
            <!-- no longer need a button to go back as this is the page being updated   <a class="btn" href="index.php">Back</a>   -->
          </div>
        </form>
      </div>
    </div>

    <?php require_once('includes/footer.php');?>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

 </body>
</html>