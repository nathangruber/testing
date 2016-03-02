<?php
    require '../database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
        if ( null==$id ) {
        header("Location: index.php");
      } else {
          $pdo = Database::connect();
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "SELECT * FROM transaction_products where id = ?";
          $q = $pdo->prepare($sql);
          $q->execute(array($id));
          $data = $q->fetch(PDO::FETCH_ASSOC);
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
                        <h3>Read a Transaction</h3>
                    </div>
                     
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Quantity</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['quantity'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Transaction Subtotal</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['transaction_subtotal'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Product</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['product_fk'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Transaction</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['transaction_fk'];?>
                            </label>
                        </div>
                      </div>
                        
                      
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>