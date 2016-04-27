<?php
session_start();
$_SESSION = array();
session_destroy();
echo "logged out successfully";
header("Location: index.php");

 ?>
