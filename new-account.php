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
  <link rel="stylesheet" href="http://localhost/CloMaT_ProiectTW/login_css/style.css" type="text/css" >
  <script src="http://localhost/CloMaT_ProiectTW/js/showError.js"></script>
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
    <h2>Cont nou</h2>
    <form action="http://localhost/CloMaT_ProiectTW/Not_here/new-account.inc.php" method="POST" id="from" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <div class="user-box">
        <input type="text" name="username" required>
        <label>Username</label>
      </div>

      <div class="user-box">
        <input type="password" name="parola" required>
        <label>Parola</label>
      </div>

      <div class="user-box">
        <input type="password" name="repeta_parola" required>
        <label>Repeta parola</label>
      </div>

      <div class="user-box">
        <input type="text" name="email" required>
        <label>Email</label>
      </div>

      <div class="user-box">
        <input type="text" name="sex" required>
        <label>Sex (Female/Male/Other)</label>
      </div>

      <div class="user-box">
        <input type="text" name="data" required>
        <label>Data nasterii (YYYY/MM/DD)</label>
      </div>

      <a href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
          <input type="submit" name="submit"> 
      </a>

    </form>
    
  <?php
        $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if(strpos($fullUrl, "account=succes") == true)
        {
          echo "<div class=\"error-messageNewAccount2\">
          <h2>
          Contul a fost creat cu succes!
          </h2>
          </div>
              ";
          exit();
        }elseif(strpos($fullUrl, "account=usernameExistent") == true)
        {
          echo "<div class=\"error-messageNewAccount\">
          <h2>
          Acest username exista deja!
          </h2>
          </div>
              ";
          exit();
        }elseif(strpos($fullUrl, "account=emailExistent") == true)
        {
          echo "<div class=\"error-messageNewAccount\">
          <h2>
          Acest email a fost folosit deja!
          </h2>
          </div>
              ";
          exit();
        }elseif(strpos($fullUrl, "account=paroleDiferite") == true)
        {
          echo "<div class=\"error-messageNewAccount\">
          <h2>
          Parolele nu coincid!
          </h2>
          </div>
              ";
          exit();
        }elseif(strpos($fullUrl, "account=sex") == true)
        {
          echo "<div class=\"error-messageNewAccount\">
          <h2>
          Sexul nu respecta formatul propus!
          </h2>
          </div>
              ";
          exit();
        }elseif(strpos($fullUrl, "account=formatdata") == true)
        {
          echo "<div class=\"error-messageNewAccount\">
          <h2>
          Data de nastere nu respecta formatul!
          </h2>
          </div>
              ";
          exit();
        }elseif(strpos($fullUrl, "account=parolascurta") == true)
        {
          echo "<div class=\"error-messageNewAccount\">
          <h2>
          Parola este prea scurta! Minim 8 caractere
          </h2>
          </div>
              ";
          exit();
        }
  ?>
  </div>

</body>
</html>
