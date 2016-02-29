<?php
     
    require_once '../database.php';
    require_once '../navbar.php';
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $street_1Error = null;
        $street_2Error = null;
        $cityError = null;
        $stateError = null;
        $zip_codeError = null;
        $countryError = null;
        // keep track post values
        $name = $_POST['name'];
        $street_1 = $_POST['street_1'];
        $street_2 = $_POST['street_2'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip_code = $_POST['zip_code'];
        $country = $_POST['country'];
        // validate input
       $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }
         
        if (empty($street_1)) {
            $street_1Error = 'Please enter Valid Street Address';
            $valid = false;
         }
         
        if (empty($street_2)) {
            $street_2Error = 'Please enter Valid Street Address';
            $valid = false;
        }
         if (empty($city)) {
            $cityError = 'Please enter City';
            $valid = false;
        }
         if (empty($state)) {
            $stateError = 'Please enter State';
            $valid = false;
        }
        if (empty($zip_code)) {
            $zip_codeError = 'Please enter Zip Code';
            $valid = false;
        }
        if (empty($country)) {
            $countryError = 'Please enter Country';
            $valid = false;
        }
       
        // insert data
        if ($valid) {
	
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO address (name,street_1,street_2,city,state,zip_code,country) values(?, ?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$street_1,$street_2,$city,$state,$zip_code,$country));
            Database::disconnect();
            header("Location: index.php");
	}
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
<html lang="en">
<head>
    <meta charset="utf-8">
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">       <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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

                      <div class="control-group <?php echo !empty($stateError)?'error':'';?>">
                        <label class="control-label">State</label>
                        <div class="controls">
                            <input name="state" type="text"  placeholder="State" value="<?php echo !empty($state)?$state:'';?>">
                            <?php if (!empty($stateError)): ?>
                                <span class="help-inline"><?php echo $stateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($zip_codeError)?'error':'';?>">
                        <label class="control-label">Zip Code</label>
                        <div class="controls">
                            <input name="zip_code" type="text"  placeholder="Zip Code" value="<?php echo !empty($zip_code)?$zip_code:'';?>">
                            <?php if (!empty($zip_codeError)): ?>
                                <span class="help-inline"><?php echo $zip_codeError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($countryError)?'error':'';?>">
                        <label class="control-label">Country</label>
                        <div class="controls">
                            <input name="country" type="text"  placeholder="Country" value="<?php echo !empty($country)?$country:'';?>">
                            <?php if (!empty($countryError)): ?>
                                <span class="help-inline"><?php echo $countryError;?></span>
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