<?php
session_start();

  unset($_SESSION['username']);
  unset($_SESSION['email']);
  unset($_SESSION['sex']);
  unset($_SESSION['areRuda']);
  header("Location: index.php");
