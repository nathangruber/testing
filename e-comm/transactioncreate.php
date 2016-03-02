<?php
     
    require_once '../database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $subtotalError = null;
        $taxError = null;
        $date_Error = null;
        $cartError = null;
        $customer_fkError = null;
        $creditcard_fkError = null;
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
        // insert data
        if ($valid) {
	       try {
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO transaction (subtotal,tax,date_,cart,customer_fk,creditcard_fk) values(?, ?, ?, ?, ?, ?)";
                $q = $pdo->prepare($sql);
                $q->execute(array($subtotal,$tax,$date_,$cart,$customer_fk,$creditcard_fk));
                Database::disconnect();
                header("Location: index.php");
           } catch (PDOException $e) {
                //echo "msg: " . $e->getMessage();
                //die();
                Database::disconnect();
                header("Location: index.php");
            }
	}
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Transaction</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($subtotalError)?'error':'';?>">
                        <label class="control-label">Subtotal</label>
                        <div class="controls">
                            <input name="subtotal" type="text"  placeholder="Subtotal" value="<?php echo !empty($subtotal)?$name:'';?>">
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
                        <label class="control-label">Credit Card</label>
                        <div class="controls">
                            <input name="creditcard_fk" type="text"  placeholder="Credit Card" value="<?php echo !empty($creditcard_fk)?$creditcard_fk:'';?>">
                            <?php if (!empty($creditcard_fkError)): ?>
                                <span class="help-inline"><?php echo $creditcard_fkError;?></span>
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