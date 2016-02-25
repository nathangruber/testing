<?php
    require '../database.php';
 
    if ( !isset($_GET['id']) || empty($_GET['id'])) {
        header("Location: index.php");
    } 
    $id = $_GET['id'];
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $quantityError = null;
        $transaction_subtotalError = null;
        $product_fkError = null;
        $transaction_fkError= null;
         
        // keep track post values
        $quantity = $_POST['quantity'];
        $transaction_subtotal = $_POST['transaction_subtotal'];
        $product_fk = $_POST['product_fk'];
        $transaction_fk = $_POST['transaction_fk'];
        
        // validate input
        $valid = true;
        if (empty($quantity)) {
            $quantityError = 'Please enter Quantity';
            $valid = false;
        }
         
        if (empty($transaction_subtotal)) {
            $transaction_subtotalError = 'Subtotal';
            $valid = false;
      //email verification was here
        }
        if (empty($product_fk)) {
            $product_fkError = 'Product';
            $valid = false; 
        }
       if (empty($transaction_fk)) {
            $transaction_fkError = 'Transaction';
            $valid = false;
        }
       
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE transaction_products set quantity = ?, transaction_subtotal = ?, product_fk =?, transaction_fk = ? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($quantity,$transaction_subtotal,$product_fk,$transaction_fk,$id));
            Database::disconnect();
            header("Location: index.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM transaction_products where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        //$data = $q->fetch(PDO::FETCH_ASSOC);
        if(($data = $q->fetch(PDO::FETCH_ASSOC)) == false){
            header("Location: index.php");
        }
        $quantity = $data['quantity'];
        $transaction_subtotal = $data['transaction_subtotal'];
        $product_fk = $data['product_fk'];
        $transaction_fk = $data['transaction_fk'];
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
                        <h3>Update Quantity</h3>
                    </div>
             
                    <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
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
                            <input name="transaction_fk" type="text"  placeholder="Transaction" value="<?php echo !empty($transaction_fk)?$transaction_fk:'';?>">
                            <?php if (!empty($transaction_fkError)): ?>
                                <span class="help-inline"><?php echo $transaction_fkError;?></span>
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