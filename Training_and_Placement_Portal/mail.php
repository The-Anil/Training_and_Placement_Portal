<?php

if(isset($_POST['action']))
{
	if($_POST['action']=="submit")
    {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$femail = $_POST['femail'];
					$password = $_POST['password'];
					$toemail = $_POST['toemail'];
					$cc = $_POST['cc'];					
					$bcc = $_POST['bcc'];
					$subject = $_POST['subject'];
					$body = $_POST['body'];
					
					require 'PHPMailer-master/PHPMailerAutoload.php ';
					
					$mail = new PHPMailer;
					$mail->isSMTP(); // Set mailer to use SMTP
					$mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
					$mail->SMTPAuth = true; // Enable SMTP authentication
					$mail->Username = $femail; // SMTP username
					$mail->Password = $password; // SMTP password
					//$mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
					$mail->Port = 587; // TCP port to connect to

					$mail->setFrom($femail, 'Training and Placement Info , IIIT Kottayam');
					$mail->addAddress($toemail, 'Dear User');
					$mail->addCC($cc);
					$mail->addBCC($bcc);
					$mail->isHTML(true);
					$mail->Subject = $subject;
					$mail->Body = $body;
					
						if(!$mail->send()) {
							
								echo '<script>window.alert("Message could not be sent. Try again with correct detalis!!! ")</script>';
								//echo 'Mailer Error: ' . $mail->ErrorInfo;
						} else {
								echo '<script>window.alert("Message has been sent.")</script>';
								}

							}
						}
}
?>

<?php include('include_files/header_mail.php'); ?>

<div class="form">
	<form action="mail.php" method="post">
		<input id="femail" name="femail" type="text" placeholder="From: email_id@gmail.com [gmail only]" class="input-xlarge"/><br>
		<input id="password" name="password" type="password" placeholder="Email's password   [100% secured]" class="input-xlarge"/><br>
		<input id="toemail" name="toemail" type="text" placeholder="To: receiver_email@gmail.com" class="input-xlarge"/ ><br>
		<input id="cc" name="cc" type="text" placeholder="CC: 'a@gmail.com','b@gmail.com'" class="input-xlarge"/><br>
		<input id="bcc" name="bcc" type="text" placeholder="BCC: 'a@gmail.com','b@gmail.com'" class="input-xlarge"/><br>
		<input id="subject" name="subject" type="text" placeholder="Subject" class="input-xlarge"/><br>
		<textarea id="body" rows="5" name="body" placeholder="Type your message here....." class="input-xlarge"></textarea><br>
</div>
<div style="padding-left: 46%;padding-bottom:10px;">
		<input name="action" type="hidden" value="submit" /></p><br>
		<input class="btn btn-large" type="submit" name="submit" value="Send Mail">
</div>
	</form>


<?php include('include_files/footer.php');?>