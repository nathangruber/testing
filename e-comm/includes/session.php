<?php
session_start();
	
$logged = false;
if (!empty($_SESSION['username'])) {
	$loggedin = true;
}
