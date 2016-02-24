<?php
     
    require '../database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $cardnumberError = null;
        $expiration_dateError = null;
        $security_codeError = null;

        // keep track post values
        $name = $_POST['name'];
        $cardnumber = $_POST['cardnumber'];
        $expiration_date = $_POST['expiration_date'];
        $security_code = $_POST['security_code'];
      
        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }
         
        if (empty($cardnumber)) {
            $cardnumberError = 'Please enter Valid Number';
            $valid = false;
         }
         
        if (empty($expiration_date)) {
            $expiration_dateError = 'Please enter Expiration Date';
            $valid = false;
        }
         if (empty($security_code)) {
            $security_codeError = 'Please enter Security Code';
            $valid = false;
        }
         

        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO creditcard (name,cardnumber,expiration_date,security_code) values(?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$cardnumber,$expiration_date,$security_code));
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
                        <h3>Create a Credit Card</h3>
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
                      <div class="control-group <?php echo !empty($cardnumberError)?'error':'';?>">
                        <label class="control-label">Credit Card Number</label>
                        <div class="controls">
                            <input name="cardnumber" type="text" placeholder="Credit Card Number" value="<?php echo !empty($cardnumber)?$cardnumber:'';?>">
                            <?php if (!empty($cardnumberError)): ?>
                                <span class="help-inline"><?php echo $cardnumberError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($expiration_dateError)?'error':'';?>">
                        <label class="control-label">Expiration Date</label>
                        <div class="controls">
                            <input name="expiration_date" type="text"  placeholder="Expiration Date" value="<?php echo !empty($expiration_date)?$expiration_date:'';?>">
                            <?php if (!empty($expiration_dateError)): ?>
                                <span class="help-inline"><?php echo $expiration_dateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      
                      <div class="control-group <?php echo !empty($security_codeError)?'error':'';?>">
                        <label class="control-label">Security Code</label>
                        <div class="controls">
                            <input name="security_code" type="text"  placeholder="Security Code" value="<?php echo !empty($security_code)?$security_code:'';?>">
                            <?php if (!empty($security_codeError)): ?>
                                <span class="help-inline"><?php echo $security_codeError;?></span>
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
