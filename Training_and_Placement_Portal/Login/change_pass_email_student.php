<?php						// i think not done completely

include('../DB_Connections/connection.php'); 

if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$Serial_No = $_GET['Serial_No'];
$email_fetch = mysqli_query($connection,"SELECT Student_Name,Email FROM student_registration WHERE Serial_No='".$Serial_No."'");
$row_array = mysqli_fetch_array($email_fetch);
$student = $row_array['Student_Name'];
$emailid = $row_array['Email'];
mysqli_close($connection);

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

$mail->Subject = 'Account Verified ; 8-digit Password given for logging into account !';
$mail->Body = '<h1>Dear '.$student.'!</h1><br>
				<h4>Welcome to</h4><br> 
				<h2>Training and Placement Info , IIIT Kottayam</h2><br>
				<br>
				Login details :<br><br>
				<strong>Username :</strong> '.$emailid.'<br>
				<strong>Password :</strong> '.$rand.'<br>';
				
$mail->AltBody = 'Some error in sending password, send another request for registration';

	if(!$mail->send()) {
			echo '<script>window.alert("Message could not be sent !!! ")</script>';
			//echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
			echo '<script>window.alert("Changes Password sent to your Email !")</script>';
			}
echo '<meta http-equiv="refresh" content="0; URL= ../student_request.php">';
?>