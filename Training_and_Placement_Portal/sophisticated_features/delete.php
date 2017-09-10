<?php 

include('../DB_Connections/connection.php'); 

if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$Time = $_GET['Time']; // $id is now defined

// or assuming your column is indeed an int
// $id = (int)$_GET['id'];

mysqli_query($connection,"DELETE FROM contact_us WHERE Time='".$Time."'");
mysqli_close($connection);
header("Location: ../admin_page.php");
?>
