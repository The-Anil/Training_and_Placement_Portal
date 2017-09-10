<?php

include('DB_Connections/connection.php');

if(isset($_POST['action']))
{
	if($_POST['action']=="submit")
    {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			$name       = mysqli_real_escape_string($connection,$_POST['name']);
			$email      = mysqli_real_escape_string($connection,$_POST['email']);
			$subject    = mysqli_real_escape_string($connection,$_POST['subject']);
			$message    = mysqli_real_escape_string($connection,$_POST['message']);
			
			if(isset($name) && isset($email) && isset($subject) && isset($message)){
				mysqli_query($connection,"insert into contact_us(Name,Email,Subject,Message) values('".$name."','".$email."','".$subject."','".$message."')");
				echo '<script>window.alert("Successfully Done !!!!!!!")</script>';
			}
			else{
				echo '<script>window.alert("Fill the field with your suggestions/complaints/feedbacks,etc.")</script>';
			}
		}
	}
}

?>


<?php include('include_files/header_contact.php'); ?>

<!-- Page banner -->
<section id="bannerSection" style="background:url(themes/images/banner/aboutus.png) no-repeat center center #000;">
	<div class="container" >	
		<h1 id="pageTitle">Contact Us 
		</h1>
	</div>
</section>

<!--============== Contact Form ========================================================== -->
<section id="bodySection"> 	
	<div class="container">					
	<div class="row">
			<div class="span4" style="padding-left:100px">
			<h3>Mailing Address</h3>	
				Indian Institute of Information Technogoly, Kottayam<br>
				C/o IISER TVM<br/>
				Kerala, India<br/><br/>
				iiitk@iisertvm.ac.in<br/>
				Pin Code: 695017<br/>
			</div>
			
			<div class="span4" style="padding-left:150px">
				<h3>  Email Us</h3>
				<form class="form-horizontal" action="" method="post">
				<fieldset>
				  <div class="control-group">
				   
					  <input type="text" maxlength="30" name="name" id="name" placeholder="name" class="input-xlarge"/>
				   
				  </div>
				   <div class="control-group">
				   
					  <input type="text" maxlength="30" name="email" id="email" placeholder="email" class="input-xlarge"/>
				   
				  </div>
				   <div class="control-group">
				   
					  <input type="text" maxlength="50" name="subject" id="subject" placeholder="subject" class="input-xlarge"/>
				  
				  </div>
				  <div class="control-group">
					  <textarea rows="4" name="message" id="message" class="input-xlarge"></textarea>
				   
				  </div>			
					
					<input name="action" type="hidden" value="submit" /></p><br>
				    <input class="btn btn-large" id="submit" type="submit" name="submit" value="Send Message "><br><br>
				</fieldset>
			  </form>
			</div>
		</div>

		</div>
</section>
 
<?php include('include_files/footer.php'); ?>