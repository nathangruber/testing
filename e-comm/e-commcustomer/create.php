<?php
     
    require '../database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $birth_dateError = null;
        $genderError = null;
        $phone_numberError = null;
        $email_addressError = null;
        $permissionsError = null;
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
            $birth_dateError = 'Please enter your Date of Birth';
            $valid = false;
         }
         
        if (empty($gender)) {
            $genderError = 'Please enter your Gender';
            $valid = false;
        }
         if (empty($phone_number)) {
            $phone_numberError = 'Please enter your Phone Number';
            $valid = false;
        }
         if (empty($email_address)) {
            $email_addressError = 'Please enter Email Address';
            $valid = false;
        } else if ( !filter_var($email_address,FILTER_VALIDATE_EMAIL) ) {
            $email_addressError = 'Please enter a valid Email Address';
            $valid = false;
        }

        if (empty($permissions)) {
            $permissionsError = 'Please enter Permissions';
            $valid = false;
        }
        if (empty($username)) {
            $usernameError = 'Please enter your Username';
            $valid = false;
        }
        if (empty($password)) {
            $passwordError = 'Please enter your Password';
            $valid = false;
        }
       
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO customer (name,birth_date,gender,phone_number,email_address,permissions,username,password) values(?, ?, ?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$birth_date,$gender,$phone_number,$email_address,$permissions,$username,$password));
            Database::disconnect();
            header("Location: index.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">       <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Enter Customer Information</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($birth_dateError)?'error':'';?>">
                        <label class="control-label">Date of Birth</label>
                        <div class="controls">
                            <input name="birth_date" type="text" placeholder="Date of Birth" value="<?php echo !empty($birth_date)?$birth_date:'';?>">
                            <?php if (!empty($birth_dateError)): ?>
                                <span class="help-inline"><?php echo $birth_dateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($genderError)?'error':'';?>">
                        <label class="control-label">Gender</label>
                        <div class="controls">
                            <input name="gender" type="text"  placeholder="Gender" value="<?php echo !empty($gender)?$gender:'';?>">
                            <?php if (!empty($genderError)): ?>
                                <span class="help-inline"><?php echo $genderError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      
                      <div class="control-group <?php echo !empty($phone_numberError)?'error':'';?>">
                        <label class="control-label">Phone Number</label>
                        <div class="controls">
                            <input name="phone_number" type="text"  placeholder="Phone Number" value="<?php echo !empty($phone_number)?$phone_number:'';?>">
                            <?php if (!empty($phone_numberError)): ?>
                                <span class="help-inline"><?php echo $phone_numberError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($email_addressError)?'error':'';?>">
                        <label class="control-label">Email Address</label>
                        <div class="controls">
                            <input name="email_address" type="text"  placeholder="Email Address" value="<?php echo !empty($email_address)?$email_address:'';?>">
                            <?php if (!empty($email_addressError)): ?>
                                <span class="help-inline"><?php echo $email_addressError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($permissionsError)?'error':'';?>">
                        <label class="control-label">Permissions</label>
                        <div class="controls">
                            <input name="permissions" type="text"  placeholder="Permissions" value="<?php echo !empty($permissions)?$permissions:'';?>">
                            <?php if (!empty($permissionsError)): ?>
                                <span class="help-inline"><?php echo $permissionsError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($usernameError)?'error':'';?>">
                        <label class="control-label">Username</label>
                        <div class="controls">
                            <input name="username" type="text"  placeholder="Username" value="<?php echo !empty($username)?$username:'';?>">
                            <?php if (!empty($usernameError)): ?>
                                <span class="help-inline"><?php echo $usernameError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                       <div class="control-group <?php echo !empty($passwordError)?'error':'';?>">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input name="password" type="text"  placeholder="Password" value="<?php echo !empty($password)?$password:'';?>">
                            <?php if (!empty($passwordError)): ?>
                                <span class="help-inline"><?php echo $passwordError;?></span>
                            <?php endif;?>
                        </div>
                      </div>


                             <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
