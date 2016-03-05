<?php
 error_reporting(E_ALL);
    require_once 'includes/database.php';
 
    if ( !empty($_POST)) {
      // keep track post values
      $id = $_POST['id'];
      $name = $_POST['name'];
      $birth_date = $_POST['birth_date'];
      $phone_number = $_POST['phone_number'];
      $email_address = $_POST['email_address'];
      $username = $_POST['username'];
         
      function valid($uservar){
        return ( !empty($uservar) && isset($uservar) );
      }
      if (!valid($name) || !valid($birth_date) || !valid($phone_number) || !valid($email_address) || valid($username) {
        header("Location: update.php");
      } else if (!valid($email_address)) {
        header("Location: update.php");
      } else if ( !filter_var($email_address,FILTER_VALIDATE_EMAIL) ) {
        header("Location: update.php");
      }
      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE customer SET name = ?, birth_date = ?, phone_number = ?, email_address = ?, username = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($name,$birth_date,$phone_number,$email_address,$username,$id));
      Database::disconnect();
      header("Location: update.php");
    }