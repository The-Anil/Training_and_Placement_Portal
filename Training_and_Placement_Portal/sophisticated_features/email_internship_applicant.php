<?php
session_start();
$Llpname = $_SESSION['Llpname'];
include('../DB_Connections/connection.php'); 

$emailid = $_GET['Email'];

$email_fetch = mysqli_query($connection,"SELECT Student_Name,Email FROM student_registration WHERE Email='".$emailid."'");
$row_array = mysqli_fetch_array($email_fetch);
$student = $row_array['Student_Name'];


$email_fetch1 = mysqli_query($connection,"SELECT Cname FROM company_registration WHERE Llpname='".$Llpname."'");
$row_array1 = mysqli_fetch_array($email_fetch1);
$Cname = $row_array1['Cname'];


require '../PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer;


$mail->isSMTP(); // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = 'theparth1996@gmail.com '; // SMTP username
$mail->Password = 'parthofkrishna'; // SMTP password
$mail->Port = 587; // TCP port to connect to

$mail->setFrom('theparth1996@gmail.com', 'Training and Placement Info , IIIT Kottayam');
$mail->addAddress($emailid , 'User');
$mail->isHTML(true); // Set email format to HTML

$mail->Subject = 'Selection for the internship !';
$mail->Body = '<h1>Dear '.$student.'!</h1><br><br>
				Congratulations !<br>
				You have been selected for the internship in our Company.<br>
				<h3>'.$Cname.'</h3><br>
				Please! Contact your college faculty for more information.<br><br>
				Regards,<br>
				'.$Cname.'<br>
				';
				
$mail->AltBody = 'Some error in sending mail !';


	if($mail->send()) {	
			mysqli_close($connection);
			echo '<script>window.alert("Message sent to the Student\'s Email !")</script>';
	}
	else if(!$mail->send()){
		
			echo '<script>window.alert("Message could not be sent !!! ")</script>';
			//echo 'Mailer Error: ' . $mail->ErrorInfo;
	}
echo '<meta http-equiv="refresh" content="0; URL= ../internship_request.php">';

?>