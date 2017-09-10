<?php
session_start();
$Email = $_SESSION['email'];

$new_pass = $_POST['new_pass'];
$c_pass = $_POST['c_pass'];

include('../DB_Connections/connection.php');

$result = mysqli_query($connection,"SELECT Llpname FROM company_registration WHERE Email= '".$Email."'");
$row = mysqli_fetch_array($result);
$Llpname = $row['Llpname']; 


// Check connection
if (mysqli_connect_errno()) 
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(!empty($_POST['new_pass'] && $_POST['c_pass'])){
	if($new_pass == $c_pass){
			echo '<script>window.alert("Password Changed......!")</script>';
			mysqli_query($connection,"UPDATE company_registration SET Password = '".$new_pass."' WHERE Llpname='".$Llpname."'");
			echo '<meta http-equiv="refresh" content="0; URL= ../company_page.php">';
	}else{
			echo '<script>window.alert("Password Confirmation Failed....!  :(")</script>';
			echo '<meta http-equiv="refresh" content="0; URL= ../change_password_company.php">';
	}
}else{
	echo '<script>window.alert("Please, fill the required fields.....!")</script>';
	echo '<meta http-equiv="refresh" content="0; URL= ../change_password_company.php">';
}

?>