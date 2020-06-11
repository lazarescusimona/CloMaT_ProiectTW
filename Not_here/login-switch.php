<?php
  session_start();
  if(isset($_SESSION['username']))
  {
      echo"username set";
      header("Location: http://localhost/CloMaT_ProiectTW/profile-back.php");
  }
  else
  {
      echo"username not set";
      header("Location: http://localhost/CloMaT_ProiectTW/login.php");

  }