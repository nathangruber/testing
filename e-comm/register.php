<?php
     
    require_once '../database.php';
    require_once '../navbar.php';
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
            header("Location: index.php");
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
                        <h3>Enter Primary Address</h3>
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
                      <div class="control-group <?php echo !empty($street_1Error)?'error':'';?>">
                        <label class="control-label">Street Address</label>
                        <div class="controls">
                            <input name="street_1" type="text" placeholder="Street Address" value="<?php echo !empty($street_1)?$street_1:'';?>">
                            <?php if (!empty($street_1Error)): ?>
                                <span class="help-inline"><?php echo $street_1Error;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($street_2Error)?'error':'';?>">
                        <label class="control-label">Street Address</label>
                        <div class="controls">
                            <input name="street_2" type="text"  placeholder="Street Address" value="<?php echo !empty($street_2)?$street_2:'';?>">
                            <?php if (!empty($street_2Error)): ?>
                                <span class="help-inline"><?php echo $street_2Error;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      
                      <div class="control-group <?php echo !empty($cityError)?'error':'';?>">
                        <label class="control-label">City</label>
                        <div class="controls">
                            <input name="city" type="text"  placeholder="City" value="<?php echo !empty($city)?$city:'';?>">
                            <?php if (!empty($cityError)): ?>
                                <span class="help-inline"><?php echo $cityError;?></span>
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
</html>
<?php
require_once '../footer.php';
?>