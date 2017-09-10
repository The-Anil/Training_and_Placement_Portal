<?php

include('../DB_Connections/connection.php'); 

//===========================================  DELETE FUNCTION =====================================================//

function Delete($path)
{
    if (is_dir($path) === true)
    {
        $files = array_diff(scandir($path), array('.', '..'));

        foreach ($files as $file)
        {
            Delete(realpath($path) . '/' . $file);
        }

        return rmdir($path);
    }

    else if (is_file($path) === true)
    {
        return unlink($path);
    }

    return false;
}


//=================================================================================================================//

if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$Llpname = $_GET['Llpname'];
$email_fetch = mysqli_query($connection,"SELECT CName,Email FROM company_registration WHERE Llpname='".$Llpname."'");

$location = '../upload_download/Uploads_Company/'.$Llpname;

$row_array = mysqli_fetch_array($email_fetch);
$Cname = $row_array['Cname'];
$Emailid = $row_array['Email'];

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

$mail->Subject = 'Wrong details filled in the registration form';
$mail->Body = '<h1>To '.$Cname.'!</h1><br><br>
				Company\'s request for registration has ben rejected by the admin.<br><br>
				Due to some wrong informations found in the registration form.<br><br>
				Please, fill the form again for registering into the Training and Placement Information Portal.<br><br>
				Regards,<br>
				Admin,<br>
				Training and Placement Info,<br>
				<strong>IIIT Kottayam, Kerala</strong><br>
				<br>';
				
				
$mail->AltBody = 'Some error in sending message, send another request for registration';

	if($mail->send()) {
			mysqli_query($connection,"DELETE FROM company_registration WHERE Llpname='".$Llpname."'");
			Delete($location);
			mysqli_close($connection);
	}
	
	else if(!$mail->send()){
			echo '<script>window.alert("Message could not be sent !!! ")</script>';
			//echo 'Mailer Error: ' . $mail->ErrorInfo;
	}
	
	else {
			echo '<script>window.alert("Company\'s wrong details deleted from database !")</script>';
			}
echo '<meta http-equiv="refresh" content="0; URL= ../company_request.php">';
?>