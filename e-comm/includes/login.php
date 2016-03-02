<?php
require_once('database.php');
	if(!empty($_POST['username']) && isset($_POST['username'])){
		if(!empty($_POST['password']) && isset($_POST['password'])){
			
			$pdo = Database::connect();
			$username = $_POST['username'];
			$loginpassword = $_POST['password'];
		    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $sql = "SELECT * FROM customer WHERE username = ? AND password =?";
		    $q = $pdo->prepare($sql);
       		$q->execute(array($username,$loginpassword));
       		$query = $q->fetch(PDO::FETCH_ASSOC);
		    Database::disconnect();
       		$name = $query['name'];
       		$username = $query['username'];
       		$id = $query['id'];
       		$permission = $query['permission'];
			session_start();
			$_SESSION['name'] = $name;
			$_SESSION['user_name'] = $user_name;
			$_SESSION['id'] = $id;
			$_SESSION['permission'] = $permission;
       		print_r($query);
/*			if ($username == $user_name && $loginpassword == $password) {
			    echo "You have successfully logged in. Welcome back," . $_SESSION['name'] . "We've been waiting for you.";
			} else {
		    	echo "Username/Password pair not recognized.";
			}*/
			header('Location: ../index.php');			
		}
	}
	//header('Location: ../loginpage.php'); 
?>