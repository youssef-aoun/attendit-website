<?php

session_start();


function checkUserLoggedIn()
{
  if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if session is not set
    header("Location: login.php");
    exit();
  }
}

function logoutUser()
{
  session_unset();

  session_destroy();

  header("Location: ../login.php");
  exit();
}
?>