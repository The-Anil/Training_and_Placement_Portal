<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Student Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<link id="callCss" rel="stylesheet" href="themes/current/bootstrap.min.css" type="text/css" media="screen"/>
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
	<link href="themes/css/base.css" rel="stylesheet" type="text/css">
	<style type="text/css" id="enject">
		.form{
			padding-left:100px;
			padding-right:300px;
		}
		.error {
			color: #FF0000;
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
						<li class=""><a href="home.php">Home	</a></li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle active" data-toggle="dropdown">Registration<b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li><a href="student_registration.php">Student Registration</a></li>
											<li><a href="company_registration.php">Company Registration</a></li>
										</ul>
									</li>  
						<li class=""><a href="statistics.php">Statistics</a></li>
						<li class=""><a href="contact.php">Contact Us</a></li>
						<li class=""><a href="about_us.php">About</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Login<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="admin_login.php">Admin</a></li>
								<li><a href="student_login.php">Student</a></li>
								<li><a href="company_login.php">Company</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!--Header Ends================================================ -->