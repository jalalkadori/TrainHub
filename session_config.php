<?php
// set the timezone
date_default_timezone_set('UTC');
// Set the session lifetime to 30 minutes
ini_set('session.gc_maxlifetime', 1800);
// Start the session
session_start();
// if the user is not connected rediredt to login.php
if(!isset($_SESSION['email'])) {  
    header('Location: login.php');
  } else {
    $full_name = $_SESSION['full_name'];
  }
?>  