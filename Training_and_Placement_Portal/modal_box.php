<?php

if(isset($_POST['action']))
{
	if($_POST['action']=="submit")
    {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$femail = $_POST['femail'];
					$password = $_POST['password'];
					$toemail = $_POST['toemail'];
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

<!-- Trigger/Open The Modal -->
<div style="position: fixed; bottom: 38px; right: 10px;">
<button id="myBtn" class="btn btn-large" >Reply  <i class="icon-share-alt"></i></button>
</div>

<!-- The Modal -->
<div id="myModal" class="modal" style="padding-left:20%;padding-right:20%;padding-top:20%;padding-bottom:20%">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Send Mail </h2>
    </div>
    <div class="modal-body" style="padding-top:30px;background-color:#B3B3B3">
      <div class="form">
	<form action="modal_box.php" method="post">
		<input id="femail" name="femail" type="text" placeholder="From: email_id@gmail.com [gmail only]" class="input-xlarge"/><br>
		<input id="password" name="password" type="password" placeholder="Email's password   [100% secured]" class="input-xlarge"/><br>
		<input id="toemail" name="toemail" type="text" placeholder="To: receiver_email@gmail.com" class="input-xlarge"/ ><br>
		<input id="subject" name="subject" type="text" placeholder="Subject" class="input-xlarge"/><br>
		<textarea id="body" rows="5" name="body" placeholder="Type your message here....." class="input-xlarge"></textarea><br>
</div>
<div style="padding-left: 26%;padding-bottom:10px;">
		<input name="action" type="hidden" value="submit" /></p><br>
		<input class="btn btn-large" type="submit" name="submit" value="Send Mail">
</div>
	</form>
    </div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
