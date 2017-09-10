<?php

session_start();
session_destroy();
echo '<script>window.alert("Logged out !")</script>';
echo '<meta http-equiv="refresh" content="0; URL= ../home.php">';
?>