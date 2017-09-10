<?php

$username = $_POST['username'];
$password = $_POST['password'];


include('../DB_Connections/connection.php');

// Check connection
if (mysqli_connect_errno()) 
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($connection,"SELECT Serial_No,Email,Password FROM student_registration WHERE Email='".$username."'");
$row_array = mysqli_fetch_array($result);
$Serial_No = $row_array['Serial_No'];
$real_email = $row_array['Email'];
$real_pass = $row_array['Password'];
 

if(!empty($_POST['username'] && $_POST['password'])){
	if($username == $real_email && $password == $real_pass){
			echo '<script>window.alert("Login Successful......!")</script>';
			session_start();
			$_SESSION['email'] = $username;
			$_SESSION['Serial_No'] = $Serial_No;
			echo '<meta http-equiv="refresh" content="0; URL= ../student_page.php">';
	}else{
			echo '<script>window.alert("Authentication Denied....!  :(")</script>';
			echo '<meta http-equiv="refresh" content="0; URL= ../student_login.php">';
	}
}else{
	echo '<script>window.alert("Please, fill the required fields.....!")</script>';
	echo '<meta http-equiv="refresh" content="0; URL= ../student_login.php">';
}

?>