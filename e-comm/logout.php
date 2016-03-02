<?php
	session_start();
	echo "You are logged out, Please come again";
	header("Location: index.php");
	session_destroy();
?>