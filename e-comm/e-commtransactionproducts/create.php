<?php
     
    require '../database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $quantityError = null;
        $transaction_subtotalError = null;
        $product_fk = null;
        $transaction_fk = null;
        
        // keep track post values
        $quantity = $_POST['quantity'];
        $transaction_subtotal = $_POST['transaction_subtotal'];
        $product_fk = $_POST['product_fkError'];
        $transaction_fk = $_POST['transaction_fkError'];
       
        // validate input
       $valid = true;
        if (empty($quantity)) {
            $nameError = 'Please enter Quantity';
            $valid = false;
        }
         
        if (empty($transaction_subtotal)) {
            $transaction_subtotalError = 'Subtotal';
            $valid = false;
         }
         
        if (empty($product_fk)) {
            $product_fkError = 'Product';
            $valid = false;
        }
         if (empty($transaction_fk)) {
            $transaction_fkError = 'Transaction';
            $valid = false;
        }
         
       
        // insert data
        if ($valid) {
	
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO transaction_products (quantity,transaction_subtotal,product_fk,transaction_fk) values(?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($quantity,$transaction_subtotal,$product_fk,$transaction_fk));
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
                        <h3>Transaction Products</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($quantityError)?'error':'';?>">
                        <label class="control-label">Quantity</label>
                        <div class="controls">
                            <input name="quantity" type="text"  placeholder="Quantity" value="<?php echo !empty($quantity)?$quantity:'';?>">
                            <?php if (!empty($quantityError)): ?>
                                <span class="help-inline"><?php echo $quantityError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($transaction_subtotalError)?'error':'';?>">
                        <label class="control-label">Transaction Subtotal</label>
                        <div class="controls">
                            <input name="transaction_subtotal" type="text" placeholder="Transaction Subtotal" value="<?php echo !empty($transaction_subtotal)?$transaction_subtotal:'';?>">
                            <?php if (!empty($transaction_subtotalError)): ?>
                                <span class="help-inline"><?php echo $transaction_subtotalError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($product_fkError)?'error':'';?>">
                        <label class="control-label">Product</label>
                        <div class="controls">
                            <input name="product_fk" type="text"  placeholder="Product" value="<?php echo !empty($product_fk)?$product_fk:'';?>">
                            <?php if (!empty($product_fkError)): ?>
                                <span class="help-inline"><?php echo $product_fkError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      
                      <div class="control-group <?php echo !empty($transaction_fkError)?'error':'';?>">
                        <label class="control-label">Transaction</label>
                        <div class="controls">
                            <input name="transaction_fk" type="text"  placeholder="transaction" value="<?php echo !empty($transaction_fk)?$transaction_fk:'';?>">
                            <?php if (!empty($transaction_fkError)): ?>
                                <span class="help-inline"><?php echo $transaction_fkError;?></span>
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