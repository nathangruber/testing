<?php
    require_once '../database.php';
 
    if ( !isset($_GET['id']) || empty($_GET['id'])) {
        header("Location: index.php");
    } 
    $id = $_GET['id'];
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $subtotalError = null;
        $taxError = null;
        $date_Error = null;
        $cartError = null;
        $customer_fkerror = null;
        $creditcard_fkerror = null;
        
        // keep track post values
        $subtotal = $_POST['subtotal'];
        $tax = $_POST['tax'];
        $date_ = $_POST['date_'];
        $cart = $_POST['cart'];
        $customer_fk = $_POST['customer_fk'];
        $creditcard_fk = $_POST['creditcard_fk'];
        // validate input
        $valid = true;
        if (empty($subtotal)) {
            $subtotalError = 'Subtotal';
            $valid = false;
        }
         
        if (empty($tax)) {
            $taxError = 'Tax';
            $valid = false;
      //email verification was here
        }
        if (empty($date_)) {
            $date_Error = 'Date';
            $valid = false; 
        }
       if (empty($cart)) {
            $cartError = 'Cart';
            $valid = false; 
        }
        if (empty($customer_fk)) {
            $customer_fkError = 'Customer';
            $valid = false; 
        }
       if (empty($creditcard_fk)) {
            $creditcard_fkError = 'Credit Card';
            $valid = false; 
        }
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE transaction set subtotal = ?, tax = ?, date_ = ?, cart = ?, customer_fk = ?, creditcard_fk = ?  WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($subtotal,$tax,$date_,$cart,$customer_fk,$creditcard_fk,$id));
            Database::disconnect();
            header("Location: index.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM transaction where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        //$data = $q->fetch(PDO::FETCH_ASSOC);
        if(($data = $q->fetch(PDO::FETCH_ASSOC)) == false){
            header("Location: index.php");
        }
        $subtotal = $data['subtotal'];
        $tax = $data['tax'];
        $date_ = $data['date_'];
        $cart = $data['cart'];
        $customer_fk = $data['customer_fk'];
        $creditcard_fk = $data['creditcard_fk'];

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
                        <h3>Update Transaction</h3>
                    </div>
             
                    <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
                      <div class="control-group <?php echo !empty($subtotalError)?'error':'';?>">
                        <label class="control-label">Subtotal</label>
                        <div class="controls">
                            <input name="subtotal" type="text"  placeholder="Subtotal" value="<?php echo !empty($subtotal)?$subtotal:'';?>">
                            <?php if (!empty($subtotalError)): ?>
                                <span class="help-inline"><?php echo $subtotalError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($taxError)?'error':'';?>">
                        <label class="control-label">Tax</label>
                        <div class="controls">
                            <input name="tax" type="text" placeholder="Tax" value="<?php echo !empty($tax)?$tax:'';?>">
                            <?php if (!empty($taxError)): ?>
                                <span class="help-inline"><?php echo $taxError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($date_Error)?'error':'';?>">
                        <label class="control-label">Date</label>
                        <div class="controls">
                            <input name="date_" type="text"  placeholder="Date" value="<?php echo !empty($date_)?$date_:'';?>">
                            <?php if (!empty($date_Error)): ?>
                                <span class="help-inline"><?php echo $date_Error;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($cartError)?'error':'';?>">
                        <label class="control-label">Cart</label>
                        <div class="controls">
                            <input name="cart" type="text"  placeholder="Cart" value="<?php echo !empty($cart)?$cart:'';?>">
                            <?php if (!empty($cartError)): ?>
                                <span class="help-inline"><?php echo $cartError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                       <div class="control-group <?php echo !empty($customer_fkError)?'error':'';?>">
                        <label class="control-label">Customer</label>
                        <div class="controls">
                            <input name="customer_fk" type="text"  placeholder="Customer" value="<?php echo !empty($customer_fk)?$customer_fk:'';?>">
                            <?php if (!empty($customer_fkError)): ?>
                                <span class="help-inline"><?php echo $customer_fkError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                       <div class="control-group <?php echo !empty($creditcard_fkError)?'error':'';?>">
                        <label class="control-label">Cart</label>
                        <div class="controls">
                            <input name="creditcard_fk" type="text"  placeholder="Cart" value="<?php echo !empty($creditcard_fk)?$creditcard_fk:'';?>">
                            <?php if (!empty($creditcard_fkError)): ?>
                                <span class="help-inline"><?php echo $creditcard_fkError;?></span>
                            <?php endif;?>
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