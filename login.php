<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CloMatchTool</title>
  <link rel="icon" type="image/png" href="http://localhost/CloMaT_ProiectTW/images/icon.png" /> 
  <link rel="stylesheet" type="text/css" href="http://localhost/CloMaT_ProiectTW/css/filtre.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/CloMaT_ProiectTW/css/lightbox.min.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/CloMaT_ProiectTW/css/new-account.css">
  <script src="http://localhost/CloMaT_ProiectTW/js/lightbox-plus-jquery.min.js"></script>
  <script src="http://localhost/CloMaT_ProiectTW/js/new_filtre.js"></script>

</head>
<body>

<div class="banner-fixed">    
  <nav>

    <div class="logo">
      <h4>OOTD</h4>
    </div>

    <ul class="nav-links">
      <li>
      <a href="http://localhost/CloMaT_ProiectTW/index.php">
            Acasa
          </a>
        </li>
        <li>
          <a href="http://localhost/CloMaT_ProiectTW/filtre-back.php">
            Inspiratie
          </a>
        </li>
        <li>
          <a href="http://localhost/CloMaT_ProiectTW/Not_here/login-switch.php">
            <?php
            if (isset($_SESSION['username'])) {
              echo 'Profil';
            } else {
              echo 'Login';
            }
            ?>
        </a>
      </li>
    </ul>

    <div class="burger">
      <div class="line1"></div>
      <div class="line2"></div>
      <div class="line3"></div>
    </div>
  </nav>
    </div>

  <div class="account-box">
    <h2>Autentificare</h2>
    <form action = "http://localhost/CloMaT_ProiectTW/Not_here/login.inc.php" method="POST" id="form">
      <div class="user-box">
        <input type="text" name="username" required>
        <label>Username</label>
      </div>

      <div class="user-box">
        <input type="password" name="password" required>
        <label>Parola</label>
      </div>

      <a href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
          <input type="submit" name="submit"> 
      </a>

      <a href="http://localhost/CloMaT_ProiectTW/new-account.php">
        Cont nou
      </a>

    </form>
  </div>

 
  <?php
        //aici afiseaza
        $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        //aici afiseaza
        if(strpos($fullUrl, "signup=notexists") == true)
        {
          echo "<div class=\"error-message\">
          <h2>
          Utilizatorul nu este inregistrat sau mailul nu este confirmat
          </h2>
          </div>
              ";
          exit();
        }
  ?>
<script src="http://localhost/CloMaT_ProiectTW/js/script.js"></script> 
</body>
</html>
