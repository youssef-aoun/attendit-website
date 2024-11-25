<?php
include('session.php'); 

logoutUser(); 

header("Location: ../login.php");
exit();
?>
