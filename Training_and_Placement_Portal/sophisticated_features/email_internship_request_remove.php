<?php
session_start();
$Llpname = $_SESSION['Llpname'];

include('../DB_Connections/connection.php'); 

if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$emailid = $_GET['Email'];
$email_fetch = mysqli_query($connection,"SELECT Student_Name,Serial_No FROM student_registration WHERE Email='".$emailid."'");
$row_array = mysqli_fetch_array($email_fetch);
$student = $row_array['Student_Name'];
$Serial_No = $row_array['Serial_No'];


$email_fetch1 = mysqli_query($connection,"SELECT Cname FROM company_registration WHERE Llpname='".$Llpname."'");
$row_array1 = mysqli_fetch_array($email_fetch1);
$Cname = $row_array1['Cname'];

require '../PHPMailer-master/PHPMailerAutoload.php ';

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

$mail->Subject = 'Request for internship rejected !';
$mail->Body = '<h1>Dear '.$student.'!</h1><br><br>
				<h3>Sorry !</h3><br>
				Your request for internship has been rejected by the company.<br><br>
				Company finds you inappropriate for this at this time.<br><br>
				Regards,<br>
				'.$Cname.'
				<br>';
				
				
$mail->AltBody = 'Some error in sending message, send another request';

	if($mail->send()) {
			mysqli_query($connection,"DELETE FROM internship_applicant WHERE Llpname='".$Llpname."'");
			mysqli_close($connection);
			echo '<script>window.alert("Student Request details deleted from database !")</script>';
	}
	
	else if(!$mail->send()){
			echo '<script>window.alert("Message could not be sent !!! ")</script>';
			//echo 'Mailer Error: ' . $mail->ErrorInfo;
	}
echo '<meta http-equiv="refresh" content="0; URL= ../internship_request.php">';
?>