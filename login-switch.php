<?php
  session_start();
  if(isset($_SESSION['username']))
  {
      echo"username set";
      header("Location: profile.php");
  }
  else
  {
      echo"username not set";
      header("Location: login.php");

  }