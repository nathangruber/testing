<?php
    require '../database.php';
 
    if ( !isset($_GET['id'])) {
        header("Location: index.php");
    } 
    $id = $_GET['id'];
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $street_1Error = null;
        $street_2Error = null;
        $cityError= null;
        $stateError = null;
        $zip_codeError = null;
        $countryError= null;
      
         
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
            $street_1Error = 'Please enter Street Address';
            $valid = false;
      //email verification was here
        }
        if (empty($street_2)) {
            $street_2Error = 'Please enter Street Address';
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
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE address set name = ?, street_1 = ?, street_2 =?, city = ?, state = ?, zip_code = ?, country = ? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$street_1,$street_2,$city,$state,$zip_code,$country,$id));
            Database::disconnect();
            header("Location: index.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM address where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $name = $data['name'];
        $street_1 = $data['street_1'];
        $street_2 = $data['street_2'];
        $city = $data['city'];
        $state = $data['state'];
        $zip_code = $data['zip_code'];
        $country = $data['country'];
        Database::disconnect();
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
                        <h3>Update a Address</h3>
                    </div>
             
                    <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
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
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($zip_codeError)?'error':'';?>">
                        <label class="control-label">Zip Code</label>
                        <div class="controls">
                            <input name="zip_code" type="text"  placeholder="Zip Code" value="<?php echo !empty($zip_code)?$zip_code:'';?>">
                            <?php if (!empty($zip_codeError)): ?>
                                <span class="help-inline"><?php echo $zip_codeError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($countryError)?'error':'';?>">
                        <label class="control-label">Country</label>
                        <div class="controls">
                            <input name="country" type="text"  placeholder="Country" value="<?php echo !empty($country)?$country:'';?>">
                            <?php if (!empty($countryError)): ?>
                                <span class="help-inline"><?php echo $countryError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                        <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
