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
       		$q->execute(array($username,$password));
       		$query = $q->fetch(PDO::FETCH_ASSOC);
		    Database::disconnect();
       		$name = $query['name'];
       		$username = $query['username'];
       		$id = $query['id'];
       		$permission = $query['permission'];
			session_start();
			$_SESSION['name'] = $name;
			$_SESSION['username'] = $username;
			$_SESSION['id'] = $id;
			$_SESSION['permission'] = $permission;
       		print_r($query);
			header('Location: ../index.php');			
		}
	}
	//header('Location: ../loginpage.php'); 
?>