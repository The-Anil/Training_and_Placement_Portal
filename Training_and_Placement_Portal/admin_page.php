<?php 
   session_start();
   if(!isset($_SESSION["admin"])){
	   header('Refresh: 0; URL = http://localhost/t/admin_login.php');
   }
?>
<?php 
include('DB_Connections/connection.php'); 
$count = mysqli_query($connection,"SELECT COUNT(Message) FROM contact_us");
$result1 = mysqli_fetch_array($count);

//$query = mysqli_query($connection,"SELECT Name,Email,Subject,Message FROM contact_us");
//$result1 = mysqli_fetch_all($query,MYSQLI_ASSOC);

// Check connection
if (mysqli_connect_errno()) 
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($connection,"SELECT * FROM contact_us");

?>

<!DOCTYPE html>
<body onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Page</title>
	<script type="text/javascript">
		function preventBack(){window.history.forward();}
		setTimeout("preventBack()",0);
		window.onload=function(){null};
	</script>
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
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width:23%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
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
						<li class="active"><a href="">Notifications <span class="badge" style="background-color:black"> <?php echo $result1[0];?> </span></a></li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Requests<b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li><a href="student_request.php">Student Registration Requests</a></li>
											<li><a href="company_request.php">Company Registration Requests</a></li>
										</ul>
									</li> 
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



<div class="container" style="padding-top:50px;">           
  <table class="table table-hover">
    <thead>
      <tr>
        <th><h5>Name</h5></th>
        <th><h5>Email-id</h5></th>
        <th><h5>Subject</h5></th>
        <th><h5>Message</h5></th>
        <th><h5>Time</h5></th>
		<th><h5>Remove</h5></th>
      </tr>
    </thead>
	  <?php 
			
			while($row = mysqli_fetch_array($result)) 
			{ 
			echo "<tbody data-link='row' class='rowlink'>";
			echo "<tr>";
			echo "<td>" . $row['Name'] . "</td>";
			echo "<td>" . $row['Email'] . "</td>";
			echo "<td>" . $row['Subject'] . "</td>";
			echo "<td>" . $row['Message'] . "</td>";
			echo "<td>" . $row['Time'] . "</td>";
			echo "<td><a href=\"sophisticated_features/delete.php?Time=".$row['Time']."\"><h5><i class=\"icon-remove-circle\" ></i></h5></a></td>";
			echo "</tr>";
			echo "</tbody>";
			}
			echo "</table>";
			mysqli_close($connection);
		?>
</div>

<?php include('modal_box.php');?>
<?php include('include_files/footer.php'); ?>