<?php
// Define $username and $password
require_once 'includes/database.php'
$user =$_POST['username'];
$pass =$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
  if ($valid) {
           try {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM customer WHERE username=? and password=?";
            $q = $pdo->prepare($sql);
            //save results for query
            $q->execute(array($username,$password));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            $username = $data['username'];
	        $id = $data['id'];
	        $password = $data['password'];
	        $permission = $data['permission'];
            // if found
            $_SESSION['username'] = $username
            $first = $data['first'];
            $last = $data['last'];
            $_SESSION['id'] = $id
            $_SESSION['password'] = $password
            $_SESSION['permission'] = $permission
        } catch (PDOException $e) {
            //echo "msg: " . $e->getMessage();
            //die);
            Database::disconnect();
            header("Location: index.php");
        }
  }
  if ($user == $username && $pass == $password) {
                echo "Welcome " . $_SESSION["first"] . " You are logged in.";
                echo  " in auth" . $_SESSION["userid"];
            }
            else {
                echo "Username or Password invalid. Please try again.";
            }
            header("Location: index.php");      
?>