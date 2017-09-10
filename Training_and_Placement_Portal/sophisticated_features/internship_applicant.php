<?php
session_start();
$Serial_No = $_SESSION['Serial_No'];
$Llpname = $_GET['Llpname'];
include('../DB_Connections/connection.php'); 
// Check connection
if (mysqli_connect_errno()) 
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($connection,"INSERT into internship_applicant VALUES ('".$Serial_No."','".$Llpname."')");

echo '<script>window.alert("Successfully Applied !")</script>';
echo '<meta http-equiv="refresh" content="0; URL= ../for_internship.php">';

?>