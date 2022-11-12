<?php
session_start();

if(isset($_SESSION["loggedIn"])) {

  logout();
}


function logout(){
  /*
  Check if the existing user has a session
  if it does
  destroy the session and redirect to login page
  */

  session_unset();
  session_destroy();
  header("Location: ../index.php");
  exit("Logout Successful");
}