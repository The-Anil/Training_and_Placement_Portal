<?php
date_default_timezone_set("Asia/Calcutta");
include('DB_Connections/connection.php');

 function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
		 
if(isset($_POST['action']))
{
	if($_POST['action']=="submit")
    {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                             $mname = mysqli_real_escape_string($connection,$_POST['mname']);
							 $name       = mysqli_real_escape_string($connection,$_POST['name']);
							 $llpname = mysqli_real_escape_string($connection,$_POST['llpname']);
			if (!empty($_POST['email'])) {
				
				$email = test_input($_POST['email']);
               // check if e-mail address is well-formed
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  echo '<script>window.alert("Invalid email format")</script>'; 
				  echo '<meta http-equiv="refresh" content="0; URL= company_registration.php">';
				  
               }else{
							 $email      = mysqli_real_escape_string($connection,$email);
			   }
            }							
							 $about      = mysqli_real_escape_string($connection,$_POST['about']);
							 $address    = mysqli_real_escape_string($connection,$_POST['address']);
							 $contact    = mysqli_real_escape_string($connection,$_POST['contact']);
							 $time       = date("s:i:h",time());
							 $date       = date("Y-m-d",time());	
		}
//======================================================== validation part ======================================================
	 
//======================================================== regarding upload  =====================================	 	
	$logo = $_FILES['logo']['name'];
	$sign = $_FILES['sign']['name'];
	
	$tmp_name1 = $_FILES['logo']['tmp_name'];
	$tmp_name2 = $_FILES['sign']['tmp_name'];
	
	$error1   = $_FILES['logo']['error'];
	$error2   = $_FILES['sign']['error'];
	
	$type1 = $_FILES['logo']['type'];
	$type2 = $_FILES['sign']['type'];
	
	$extension1 = strtolower(substr($logo, strpos($logo, '.') + 1));
	$extension2 = strtolower(substr($sign, strpos($sign, '.') + 1));
	
	if(empty($_POST['mname']) || empty($_POST['name']) || empty($_POST['llpname']) || empty($_POST['email']) || empty($_POST['contact']) || empty($_POST['address']))
	{
			echo '<script>window.alert("Some fields are not filled, please fill to proceed for registration")</script>';
	}else{
			if(isset($logo) && isset($sign)){
				if(!empty($logo) && !empty($sign)){
					
					if((($extension1=='jpg' || $extension1 == 'jpeg') && $type1=='image/jpeg') && (($extension2=='jpg' || $extension2 == 'jpeg') && $type2=='image/jpeg') ){
									$location = 'upload_download/Uploads_Company/';
									mkdir('upload_download/Uploads_Company/'.$llpname);
								if(move_uploaded_file($tmp_name1,$location.$llpname.'/'.$logo) &&
									move_uploaded_file($tmp_name2,$location.$llpname.'/'.$sign)){
										
										echo '<script>window.alert("Uploaded!!!!!!!")</script>';
									}
								else{ 
									echo '<script>window.alert("Error Uploading the File :(")</script>';
								}
								
						}
						else{
							echo '<script>window.alert("Invalid File Type of Uploaded Files :(")</script>';
						}
				}
				else{
					echo '<script>window.alert("Please Choose A File")</script>';
				}
			}
			
			mysqli_query($connection,"insert into company_registration(Mdname,Cname,Llpname,Email,Address,Tnumber,About,Logo,Sign,Time,Date)  values('".$mname."','".$name."','".$llpname."','".$email."','".$address."','".$contact."','".$about."','".$location.$llpname.'/'.$logo."','".$location.$llpname.'/'.$sign."','".$time."','".$date."')");
            echo '<script>window.alert("Successfully Done !!!!!!!")</script>';
		 }
//=============================================================================================================
	}
	
}
?>

<?php include('include_files/header_company_registration.php'); ?>

<!-- Page banner -->
<section id="bannerSection" style="background:url(themes/images/banner/contact.png) no-repeat center center #000;">
	<div class="container" >	
		<h1 id="pageTitle" >Company Registration <small style="color:yellow"> : Offers you quality students to choose from </small> 
		</h1>
	</div>
</section> 

<a href="#" class="btn" style="position: fixed; bottom: 38px; right: 10px; display: none; " id="toTop"> <i class="icon-arrow-up"></i> Go to top</a>
<!-- Javascript

<!-- FORM  ================================================== -->

<ul style="list-style-type:disc;padding-left:200px;">
		<h4>  <li style="text-decoration:underline; color:#FE5214; font-size:1.3em; padding-top:50px;" >Company Info</li></h4>
				<div class="form">
					<form action="company_registration.php" method="post" enctype="multipart/form-data"><strong>
					<pre><p>Name of the MD<span style="color:red">*</span>  :   			<input id="mname" name="mname" type="text" size="60"></p></pre>
					<pre><p>Company Name<span style="color:red">*</span>    :   	                <input id="name" name="name" type="text" size="60"></p></pre>
					<pre><p>LLP Name<span style="color:red">*</span>        :   		        <input id="llpname" name="llpname" type="text" size="60"></p></pre>
					<pre><p>Email-ID For Contacting<span style="color:red">*</span>      :         <input id="email" name="email" type="text" size="60"></p></pre>
					<pre><p>Address of Main Branch<span style="color:red">*</span>       :   	<textarea id="address" name="address" cols="23"></textarea></p></pre>
					<pre><p>Tel No.<span style="color:red">*</span>         :   	                <input id="contact" name="contact" type="number" min="6999999999" max="9999999999" size="60"></p></pre>
					<pre><p>About            :              	<textarea id="about" name="about" cols="23"></textarea></p></pre>
					<pre><p>Upload Logo<span style="color:red">*</span>     :   	    	        <input type="file" name="logo" size="60">["jpeg/jpg" files only]</p></pre>
					<pre><p>Upload Sign<span style="color:red">*</span>     :   		        <input type="file" name="sign" size="60">["jpeg/jpg" files only]</p></pre>
				</div>
		<h4>  <li style="text-decoration:underline;color:#FE5214; font-size:1.3em; padding-top:50px;">Current Details</li></h4>
				<div class="form">
					<strong>
					<pre><p>Time<span style="color:red">*</span>            :   			 <input id="time" name="time" type="text" size="60" value="<?php echo date("h:i:s a",time());?>" readonly disabled></p></pre>
					<pre><p>Date<span style="color:red">*</span>            :   			 <input id="date" name="date" type="text" size="60" value="<?php echo date("d M Y",time());?>" readonly disabled></p></pre></strong>
				</div>
	 </ul><br><br>
				<div style="padding-left:24%"><strong>( <span style="color:red">*</span> ) All fields are mandatory to be filled.</strong></div>
				<input name="action" type="hidden" value="submit" /></p><br>
				<pre>                                                                                          <input class="btn btn-large" type="submit" name="submit" value="Submit"></pre><br><br>
				</form>
<?php include('include_files/footer.php'); ?>