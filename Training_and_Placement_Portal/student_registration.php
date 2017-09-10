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
            
							 $name       = mysqli_real_escape_string($connection,$_POST['name']);
							 $serial     = mysqli_real_escape_string($connection,$_POST['serial']);
							 $fathername = mysqli_real_escape_string($connection,$_POST['fathername']);
							 $dob        = mysqli_real_escape_string($connection,$_POST['dob']);
							 $sex        = mysqli_real_escape_string($connection,$_POST['sex']);
			 
			if (!empty($_POST['email'])) {
				
				$email = test_input($_POST['email']);
               // check if e-mail address is well-formed
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  echo '<script>window.alert("Invalid email format")</script>'; 
				  echo '<meta http-equiv="refresh" content="0; URL= student_registration.php">';
				  
               }else{
							 $email      = mysqli_real_escape_string($connection,$email);
			   }
            }
							 $nationality= mysqli_real_escape_string($connection,$_POST['nationality']);
							 $address    = mysqli_real_escape_string($connection,$_POST['address']);
							 $contact    = mysqli_real_escape_string($connection,$_POST['contact']);
							 $branch     = mysqli_real_escape_string($connection,$_POST['branch']);
							 $semester   = mysqli_real_escape_string($connection,$_POST['semester']);
							 $skills     = mysqli_real_escape_string($connection,$_POST['skills']);
							 $time       = date("s:i:h",time());
							 $date       = date("Y-m-d",time());	
		}
//======================================================== validation part ======================================================
	 
//======================================================== regarding upload  =====================================	 	
	$photo = $_FILES['photo']['name'];
	$sign = $_FILES['sign']['name'];
	$cv = $_FILES['cv']['name'];
	
	$tmp_name1 = $_FILES['photo']['tmp_name'];
	$tmp_name2 = $_FILES['sign']['tmp_name'];
	$tmp_name3 = $_FILES['cv']['tmp_name'];
	
	$error1   = $_FILES['photo']['error'];
	$error2   = $_FILES['sign']['error'];
	$error3   = $_FILES['cv']['error'];
	
	$type1 = $_FILES['photo']['type'];
	$type2 = $_FILES['sign']['type'];
	$type3 = $_FILES['cv']['type'];
	
	$extension1 = strtolower(substr($photo, strpos($photo, '.') + 1));
	$extension2 = strtolower(substr($sign, strpos($sign, '.') + 1));
	$extension3 = strtolower(substr($cv, strpos($cv, '.') + 1));
	
	if(empty($_POST['name']) || empty($_POST['serial']) || empty($_POST['fathername']) || empty($_POST['dob']) || empty($_POST['sex']) || empty($_POST['email']) || empty($_POST['nationality']) || empty($_POST['address']) || empty($_POST['contact']) || empty($_POST['branch']) || empty($_POST['semester']))
	{
			echo '<script>window.alert("Some fields are not filled, please fill to proceed for registration")</script>';
	}else{
			if(isset($photo) && isset($sign) && isset($cv)){
				if(!empty($photo) && !empty($sign) && !empty($cv)){
					
					if((($extension1=='jpg' || $extension1 == 'jpeg') && $type1=='image/jpeg') && (($extension2=='jpg' || $extension2 == 'jpeg') && $type2=='image/jpeg') && (($extension3=='jpg' || $extension3 == 'jpeg') && $type3=='image/jpeg') ){
									$location = 'upload_download/Uploads/';
									mkdir('upload_download/Uploads/'.$serial);
								if(move_uploaded_file($tmp_name1,$location.$serial.'/'.$photo) &&
									move_uploaded_file($tmp_name2,$location.$serial.'/'.$sign) &&
									move_uploaded_file($tmp_name3,$location.$serial.'/'.$cv) ){
										
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
			
			mysqli_query($connection,"insert into student_registration(Student_Name,Serial_No,Father_Name,DOB,Sex,Email,Nationality,Address,Contact_No,Branch,Semester,Skills,Photo,Sign,Cv,Time,Date) values('".$name."','".$serial."','".$fathername."','".$dob."','".$sex."','".$email."','".$nationality."','".$address."','".$contact."','".$branch."','".$semester."','".$skills."','".$location.$serial.'/'.$photo."','".$location.$serial.'/'.$sign."','".$location.$serial.'/'.$cv."','".$time."','".$date."')");
            echo '<script>window.alert("Successfully Done !!!!!!!")</script>';
		 }
//=============================================================================================================
	}
	
}
?>

<?php include('include_files/header_student_registration.php'); ?>
<!-- Page banner -->
<section id="bannerSection" style="background:url(themes/images/banner/contact.png) no-repeat center center #000;">
	<div class="container" >	
		<h1 id="pageTitle" >Student Registration <small style="color:yellow"> : Makes it easier to choose your job in future </small> 
		</h1>
	</div>
</section> 

<a href="#" class="btn" style="position: fixed; bottom: 38px; right: 10px; display: none; " id="toTop"> <i class="icon-arrow-up"></i> Go to top</a>
<!-- Javascript

<!-- FORM  ================================================== -->

<ul style="list-style-type:disc;padding-left:200px;">
		<h4>  <li style="text-decoration:underline; color:#FE5214; font-size:1.3em; padding-top:50px;" >Personal Information</li></h4>
				<div class="form">
					<form action="student_registration.php" method="post" enctype="multipart/form-data"><strong>
					<pre><p>Student Name<span style="color:red">*</span>  :   			<input id="name" name="name" type="text" size="60"></p></pre>
					<pre><p>Serial No.  <span style="color:red">*</span>  :  		        <input id="serial" name="serial" type="text" size="60" maxlength="11"></p></pre>
					<pre><p>Father's Name<span style="color:red">*</span> :   			<input id="fathername" name="fathername" type="text" size="60"></p></pre>
					<pre><p>Date Of Birth<span style="color:red">*</span> :   			<input id="dob" name="dob" type="text" size="60"></p></pre>
					   <pre>Sex<span style="color:red">*</span>           :   			<input type="radio" name="sex" value="male">M	           <input type="radio" name="sex" value="female">F</pre>
					<pre><p>Email-ID<span style="color:red">*</span>      :   			<input id="email" name="email" type="text" size="60"></p></pre>
					<pre><p>Nationality<span style="color:red">*</span>   :   			<input id="nationality" name="nationality" type="text" size="60"></p></pre>
					<pre><p>Full Address<span style="color:red">*</span>  :   			<textarea id="address" name="address" cols="23"></textarea></p></pre>
					<pre><p>Contact No.<span style="color:red">*</span>   :   			<input id="contact" name="contact" type="number" min="6999999999" max="9999999999" size="60"></p></pre></strong>
				</div>
		<h4>  <li style="text-decoration:underline;color:#FE5214; font-size:1.3em; padding-top:50px;">About Branch And Academics</li></h4>
				<div class="form">
					<strong>
					<pre><p>Branch<span style="color:red">*</span>        :   			<input id="branch" name="branch" type="text" size="60"></p></pre>
					<pre><p>Semester<span style="color:red">*</span>      :   			<input id="semester" name="semester" type="number" size="60" min="1" max="8"></p></pre>
					<pre><p>Skills<span style="color:red">*</span>        :   			<textarea id="skills" name="skills" type="text" cols="23"></textarea></p></pre>
					<pre><p>Upload Photo<span style="color:red">*</span>  :   			<input type="file" name="photo" size="60">["jpeg/jpg" files only]</p></pre>
					<pre><p>Upload Sign<span style="color:red">*</span>   :   			<input type="file" name="sign" size="60">["jpeg/jpg" files only]</p></pre>
					<pre><p>Upload CV<span style="color:red">*</span>     :   			<input type="file" name="cv" size="60">["jpeg/jpg" files only]</p></pre></strong>
				</div>
		<h4>  <li style="text-decoration:underline;color:#FE5214; font-size:1.3em; padding-top:50px;">Current Details</li></h4>
				<div class="form">
					<strong>
					<pre><p>Time<span style="color:red">*</span>          :   			<input id="time" name="time" type="text" size="60" value="<?php echo date("h:i:s a",time());?>" readonly disabled></p></pre>
					<pre><p>Date<span style="color:red">*</span>          :   			<input id="date" name="date" type="text" size="60" value="<?php echo date("d M Y",time());?>" readonly disabled></p></pre></strong>
				</div>
	 </ul><br><br>
				<div style="padding-left:24%"><strong>( <span style="color:red">*</span> ) All fields are mandatory to be filled.</strong></div>
				<input name="action" type="hidden" value="submit" /></p><br>
				<pre>                                                                                          <input class="btn btn-large" type="submit" name="submit" value="Submit"></pre><br><br>
				</form>
				
				
<?php include('include_files/footer.php'); ?>