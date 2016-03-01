<?php
     require_once '../database.php';
    //require_once '../navbar.php';
    if ( !empty($_POST)) {
        // keep track validation errors
        $your_full_nameError = null;
        $email_addressError = null;
        $usernameError = null;
        $passwordError = null;
        
        // keep track post values
        $your_full_name = $_POST['your_full_name'];
        $email_address = $_POST['email_address'];
        $username = $_POST['username'];
        $password = $_POST['password'];
       
        // validate input
       $valid = true;
        if (empty($your_full_name)) {
            $your_full_nameError = 'Please enter Your Full Name';
            $valid = false;
        }
         
        if (empty($email_address)) {
            $email_addressError = 'Please enter Valid Email Address';
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
	
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO register (your_full_name,email_address,username,password) values(?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($your_full_name,$email_address,$username,$password,$id));
            Database::disconnect();
            header("Location: registration");
	}
    }
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">       
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Register</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($your_full_nameError)?'error':'';?>">
                        <label class="control-label">Your Full Name</label>
                        <div class="controls">
                            <input name="your_full_name" type="text"  placeholder="Your Full Name" value="<?php echo !empty($your_full_name)?$your_full_name:'';?>">
                            <?php if (!empty($your_full_nameError)): ?>
                                <span class="help-inline"><?php echo $your_full_nameError;?></span>
                            <?php endif; ?>
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
                            <input name="username" type="text"  placeholder="Enter Username" value="<?php echo !empty($username)?$username:'';?>">
                            <?php if (!empty($usernameError)): ?>
                                <span class="help-inline"><?php echo $usernameError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      
                      <div class="control-group <?php echo !empty($passwordError)?'error':'';?>">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input name="password" type="text"  placeholder="Enter Password" value="<?php echo !empty($password)?$password:'';?>">
                            <?php if (!empty($passwordError)): ?>
                                <span class="help-inline"><?php echo $passwordError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="registrationsuccess.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
<?php
//require_once '../footer.php';
?>