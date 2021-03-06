<?php
    require_once '../database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
        if ( null==$id ) {
        header("Location: index.php");
      } else {
          $pdo = Database::connect();
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "SELECT * FROM transaction where id = ?";
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
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Transaction</h3>
                    </div>
                     
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Subtotal</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['subtotal'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Tax</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['tax'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Date</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['date_'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Cart</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['cart'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Customer</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['customer_fk'];?>
                            </label>
                        </div>
                      </div>
                     <div class="control-group">
                        <label class="control-label">Credit Card</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['creditcard_fk'];?>
                            </label>
                        </div>
                      </div>
                     
                     
                      </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>