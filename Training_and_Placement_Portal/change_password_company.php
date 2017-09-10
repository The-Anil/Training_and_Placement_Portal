<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Company Page</title>
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
						<li class=""><a href="">View Submitted Documents</a></li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Requests<b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li><a href="">Internship Requests</a></li>
											<li><a href="">Placement Requests</a></li>
										</ul>
									</li> 
						<li class=""><a href="">Slot Booking</a></li>						
						<li class="active"><a href="change_password_company.php">Change Password</a></li>
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

<div class="span4" style="padding-left:500px; padding-top:100px">	
				<h1 style="padding-left:130px"> <i class="icon-lock" style="color:#FE5214"></i> </h1>
				<form class="form-horizontal" action="Login/change_pass_company.php" method="post" enctype="multipart/form-data">
				<fieldset>
				  <div class="control-group">
				   
					  <i class="icon-key"></i><input type="password" id="new_pass" name="new_pass" placeholder="New Password" class="input-xlarge"/>
				   
				  </div>
				   <div class="control-group">
				   
					  <i class="icon-key"></i><input type="password" id="c_pass" name="c_pass"  placeholder="Confirm New Password" class="input-xlarge"/>
				   
				  </div>
				  <div  style="padding-left:60px; padding-top:30px">
					<button class="btn btn-large" type="submit">Change Password</button>
				  </div
				</fieldset>
			  </form>
</div>


<?php include('include_files/footer.php'); ?>