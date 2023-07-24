<?php
	session_start();
	//ob_start();
	$_SESSION['adminusername']="";
	$_SESSION['adminuserpass']="";
	
	$_SESSION['username']="";
	$_SESSION['userpass']="";
	$_SESSION['user_type']="";
	$_SESSION['loggedIn_user_id']="";
	$_SESSION['user_id']="";
	
	unset($_SESSION['adminusername']);
	unset($_SESSION['adminuserpass']);
	unset($_SESSION['user_id']);
	
	unset($_SESSION['username']);
	unset($_SESSION['userpass']);
	unset($_SESSION['user_type']);
	unset($_SESSION['loggedIn_user_id']);
	
	session_destroy();
	header('location:../admin.php');
?>