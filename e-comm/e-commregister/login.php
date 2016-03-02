<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (empty($_POST['username']) || empty($_POST['password']) || !isset($_POST['password']) || !isset($_POST['username']) ) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
  if ($valid) {
           try {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM customer WHERE username=? and password=?";
            $q = $pdo->prepare($sql);
            //save results for query
            $q->execute(array($username,$password));

            // if found
            //$_SESSION['uid'] = .....
            //$_SESSION['name'] = .....
            //$_SESSION['permission'] = .....


            Database::disconnect();
            header("Location: index.php");
        } catch (PDOException $e) {
            //echo "msg: " . $e->getMessage();
            //die);
            Database::disconnect();
            header("Location: login.php");
        }
  }
?>