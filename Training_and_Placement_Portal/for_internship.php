<?php 
include('DB_Connections/connection.php'); 
// Check connection
if (mysqli_connect_errno()) 
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($connection,"SELECT Logo,Cname,Email,Tnumber,About,Llpname FROM company_registration WHERE Password IS NOT NULL");

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
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
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
						<li class=""><a href="student_page.php">Back</a></li>									
						<li class="active"><a href="Logout/admin_logout.php">Logout</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ================================= Header Ends ================================================ -->

<!-- Page banner -->
<section id="bannerSection" style="background:url(themes/images/banner/portfolio.png) no-repeat center center #000;">
	<div class="container" >	
		<h1 id="pageTitle">For Internship
		</h1>
	</div>
</section> 

<!-- ============================================================================================================== -->
<div class="container" style="padding-top:50px;">           
  <table class="table table-hover">
    <thead>
      <tr>
		<th><h5>Logo</h5></th>
        <th><h5>Company Name</h5></th>
        <th><h5>Company Email</h5></th>
        <th><h5>Telephone No.</h5></th>
		<th><h5>About</h5></th>
		<th><h5>Apply</h5></th>
		<th><h5></h5></th>
      </tr>
    </thead>
    <tbody>
	  <?php 
		while($row = mysqli_fetch_array($result)) 
			{ 
			$c=$row['Logo'];
			echo "<tbody data-link='row' class='rowlink'>";
			echo "<tr>";
			echo "<td><img class='modal_logo' actualpath=\"".$c."\"  src=\"".$c."\" alt=\"Photo\" width=\"40\" height=\"20\"></td>";
			echo "<td>" . $row['Cname'] . "</td>";
			echo "<td>" . $row['Email'] . "</td>";
			echo "<td>" . $row['Tnumber'] . "</td>";
			echo "<td>" . $row['About'] . "</td>";
			echo "<td><a href=\"sophisticated_features/internship_applicant.php?Llpname=".$row['Llpname']."\"><img src=\"apply_now.png\" alt=\"Logo\" width=\"40\" height=\"20\"></a></td>";
			echo "</tr>";
			echo "</t body>";
			}
			echo "</table>";
			mysqli_close($connection);
		?>
</div>

<!-- The Modal -->
<div id="myModal" class="modal" style="margin: 0;">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
</div>


<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
//var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");

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

$('.modal_logo').click(function(){
    modal.style.display = "block";
    modalImg.src = $(this).attr('actualpath');
});

</script>


<?php include('include_files/footer.php'); ?>