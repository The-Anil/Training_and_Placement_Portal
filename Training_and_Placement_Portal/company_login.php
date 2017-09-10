<?php include('include_files/header_company_login.php');?>

<!-- Page banner -->
<section id="bannerSection" style="background:url(themes/images/banner/aboutus.png) no-repeat center center #000;">
	<div class="container" >	
		<h1 id="pageTitle">Company Login  
		</h1>
	</div>
</section> 

<div class="span4" style="padding-left:500px; padding-top:100px">	
				<h1 style="padding-left:130px"> <i class="icon-lock" style="color:#FE5214"></i> </h1>
				<form class="form-horizontal" action="Login/company_login_process.php" method="post" enctype="multipart/form-data">
				<fieldset>
				  <div class="control-group">
				   
					  <i class="icon-user"></i><input type="text" id="username" name="username" placeholder="Username / Email ID" class="input-xlarge"/>
				   
				  </div>
				   <div class="control-group">
				   
					  <i class="icon-key"></i><input type="password" id="password" name="password"  placeholder="Password" class="input-xlarge"/>
				   
				  </div>
				  <div  style="padding-left:90px; padding-top:30px">
					<button class="btn btn-large" type="submit">Login <i class="icon-share-alt"></i></button>
				  </div
				</fieldset>
			  </form>
			</div>



<?php include('include_files/footer.php'); ?>