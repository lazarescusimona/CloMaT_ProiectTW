<?php
  session_start();
?>

<html>
  <head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CloMatchTool</title>
  <link rel="icon" type="image/png" href="images/icon.png" /> 
  <link rel="stylesheet" type="text/css" href="css/filtre.css">
  <link rel="stylesheet" type="text/css" href="login_css/style.css">
  <link rel="stylesheet" type="text/CSS" href="css/profile.css" />
	</head>
	<body>

    
    <div class="banner-fixed" style="z-index: 2;">    
  <nav>

    <div class="logo">
      <h4>OOTD</h4>
    </div>

    <ul class="nav-links">
      <li>
        <a href="index.php">
          Acasa
        </a>
      </li>
      <li>
        <a href="filtre.php">
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
    </div>

		<div class="portfoliocard"style="z-index: 1;">
		<div class="coverphoto"></div>
		<div class="profile_picture"></div>
		<div class="left_col">
			<div class="following">
				<div class="follow_count">Username</div>
				<?php
        if(isset($_SESSION['username']))
        {
          echo($_SESSION['username']);
        }
        else
        {
          echo("necunoscut");
        }
        ?>
      </div>
      <div class="following">
				<div class="follow_count">Email</div>
				<?php
        if(isset($_SESSION['email']))
        {
          echo($_SESSION['email']);
        }
        else
        {
          echo("necunoscut");
        }
        ?>
      </div>
      <div class="following">
				<div class="follow_count">Data nasterii</div>
				<?php
        if(isset($_SESSION['birthday']))
        {
          echo($_SESSION['birthday']);
        }
        else
        {
          echo("necunoscut");
        }
        ?>
      </div>
      <div class="following">
				<div class="follow_count">Gender</div>
				<?php
        if(isset($_SESSION['sex']))
        {
          echo($_SESSION['sex']);
        }
        else
        {
          echo("necunoscut");
        }
        ?>
      </div>
		</div>
		<div class="right_col">

			<h2 class="name">
        <?php
        if(isset($_SESSION['username']))
        {
          echo($_SESSION['username']);
        }
        else
        {
          echo("necunoscut");
        }
        ?>
      </h2>

      <h3 class="location">Poze salvate</h3>
      
		</div>
    </div>


        <script src="js/script.js"></script> 
        
	</body>
</html>