<?php
session_start();
session_destroy();  // Destroy the session and all its data
header("Location: login.php");  // Redirect the user to the login page
exit();  // Terminate the current script execution
?>
