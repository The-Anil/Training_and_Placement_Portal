<?php 
include('DB_Connections/connection.php'); 
session_start();
   if(!isset($_SESSION['Serial_No'])&&!isset($_SESSION["email"])){
	   header('Refresh: 0; URL = http://localhost/t/student_login.php');
   }
$Email = $_SESSION['email'];

// Check connection
if (mysqli_connect_errno()) 
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result3 = mysqli_query($connection,"SELECT Photo,Cv,Sign FROM student_registration WHERE Email= '".$Email."'");
$row3 = mysqli_fetch_array($result3);
$Photo = $row3['Photo'];
$Cv = $row3['Cv'];
$Sign = $row3['Sign'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Student Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="The_Anil">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<link id="callCss" rel="stylesheet" href="themes/current/bootstrap.min.css" type="text/css" media="screen"/>
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
	<link href="themes/css/base.css" rel="stylesheet" type="text/css">
	<style type="text/css" id="enject"></style>
	<script src="themes/js/jquery-1.8.3.min.js"></script>
	
	<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 120px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    margin: auto;
    padding-left: 40%;
    width:23%;
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: #FF6600
;
    color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}
</style>
</head>
<body>
<section id="headerSection">
	<div class="container">
		<div class="navbar">
			<div class="container">
				<button type="button" class="btn btn-navbar active" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<h1><a class="brand" href="home.php"> IIIT Kottayam <small>  Training and Placement Info</small></a></h1>
				<div class="nav-collapse collapse">
					<ul class="nav pull-right">
						<li class="active"><a href="">View Submitted Documents</a></li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Apply<b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li><a href="for_internship.php">For Internship</a></li>
											<li><a href="for_placement.php">For Placement</a></li>
										</ul>
									</li> 
						
						<li class=""><a href="change_password.php">Change Password</a></li>
						<li class=""><a href="Logout/admin_logout.php">Logout</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!--Header Ends================================================ -->

<!-- Page banner -->
<section id="bannerSection" style="background:url(themes/images/banner/portfolio.png) no-repeat center center #000;">
	<div class="container" >	
		<h1 id="pageTitle">Hi !
		</h1>
	</div>
</section> 


<!-- The Modal -->
<div id="myModal" class="modal" style="margin: 0;">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
</div>


<div style="padding:20px; margin-top:14%">
<pre><button class="btn btn-large modal_photo" type="submit" actualpath="<?php echo $Photo; ?>">Photo   <i class="icon-camera"></i></button>									<button class="btn btn-large modal_cv" type="submit" actualpath="<?php echo $Cv; ?>">Cv    <i class="icon-edit"></i></button>					   			     <button class="btn btn-large modal_sign" type="submit" actualpath="<?php echo $Sign; ?>">Signature   <i class="icon-pencil"></i></button></pre>
</div>





<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
//var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

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


//var img1 = document.getElementById('myImg1');

$('.modal_photo').click(function(){
    modal.style.display = "block";
    modalImg.src = $(this).attr('actualpath');
});


$('.modal_cv').click(function(){
    modal.style.display = "block";
    modalImg.src = $(this).attr('actualpath');
});


$('.modal_sign').click(function(){
    modal.style.display = "block";
    modalImg.src = $(this).attr('actualpath');
});

</script>

<?php include('include_files/footer.php'); ?>