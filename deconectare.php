<?php
session_start();

  unset($_SESSION['username']);
  unset($_SESSION['email']);
  unset($_SESSION['sex']);
  header("Location: index.php");
