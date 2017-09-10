<?php

include('../DB_Connections/connection.php'); 

if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$Llpname = $_GET['Llpname'];
$email_fetch = mysqli_query($connection,"SELECT CName,Email FROM company_registration WHERE Llpname='".$Llpname."'");
$row_array = mysqli_fetch_array($email_fetch);
$Cname = $row_array['CName'];
$Emailid = $row_array['Email'];
$rand = mt_rand ( 10000000, 99999999 );

require '../PHPMailer-master/PHPMailerAutoload.php ';

$mail = new PHPMailer;


$mail->isSMTP(); // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = 'theparth1996@gmail.com '; // SMTP username
$mail->Password = 'parthofkrishna'; // SMTP password
$mail->Port = 587; // TCP port to connect to

$mail->setFrom('theparth1996@gmail.com', 'Training and Placement Info , IIIT Kottayam');
$mail->addAddress($Emailid , 'User');
$mail->isHTML(true); // Set email format to HTML

$mail->Subject = 'Account Verified ; 8-digit Password given for logging into account !';
$mail->Body = '<h1>To '.$Cname.'!</h1><br>
				<h4>Welcome to</h4><br> 
				<h2>Training and Placement Info , IIIT Kottayam</h2><br>
				<br>
				Login details :<br><br>
				<strong>Username :</strong> '.$Emailid.'<br>
				<strong>Password :</strong> '.$rand.'<br>';
				
$mail->AltBody = 'Some error in sending password, send another request for registration';


	if($mail->send()) {	
			mysqli_query($connection,"UPDATE company_registration SET Password = ".$rand." WHERE Llpname='".$Llpname."'");
			mysqli_close($connection);
			echo '<script>window.alert("Password sent to the Company\'s Email !")</script>';
	}
	else if(!$mail->send()){
		
			echo '<script>window.alert("Message could not be sent !!! ")</script>';
			//echo 'Mailer Error: ' . $mail->ErrorInfo;
	}
echo '<meta http-equiv="refresh" content="0; URL= ../company_request.php">';
?>