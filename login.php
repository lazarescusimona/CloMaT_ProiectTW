<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CloMatchTool</title>
  <link rel="icon" type="image/png" href="images/icon.png" /> 
  <link rel="stylesheet" type="text/css" href="css/filtre.css">
  <link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
  <link rel="stylesheet" type="text/css" href="css/new-account.css">
  <script src="js/lightbox-plus-jquery.min.js"></script>
    
</head>
<body>

    
  <nav>

    <div class="logo">
      <h4>OOTD</h4>
    </div>

    <ul class="nav-links">
      <li>
        <a href="index.html">
          Acasa
        </a>
      </li>
      <li>
        <a href="filtre.html">
          Creeaza Outfit
        </a>
      </li>
      <li>
        <a href="#">
          Inspiratie
        </a>
      </li>
      <li>
        <a href="login.php">
          Login
        </a>
      </li>
    </ul>

    <div class="burger">
      <div class="line1"></div>
      <div class="line2"></div>
      <div class="line3"></div>
    </div>
  </nav>


  <div class="account-box">
    <h2>Autentificare</h2>
    <form action = "login.inc.php" method="POST" id="form">
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

      <a href="new-account.php">
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
          Utilizatorul nu este inregistrat
          </h2>
          </div>
              ";
          exit();
        }
  ?>

</body>
</html>