<?php

$username = $_POST['username'];
$password = $_POST['password'];



if(!empty($_POST['username'] && $_POST['password'])){
	if($username == "admin" && $password == "admin"){
				session_start();
				$_SESSION['admin'] = 'admin';
				if(isset($_SESSION['admin'])){
					echo '<script>window.alert("Login Successful......!")</script>';
					echo '<meta http-equiv="refresh" content="0; URL= ../admin_page.php">';
				}
				else{
					echo '<script>window.alert("Please login !")</script>';
				}
	}else{
			echo '<script>window.alert("Authentication Denied....!  :(")</script>';
			echo '<meta http-equiv="refresh" content="0; URL= ../admin_login.php">';
	}
}else{
	echo '<script>window.alert("Please, fill the required fields.....!")</script>';
	echo '<meta http-equiv="refresh" content="0; URL= ../admin_login.php">';
}

?>