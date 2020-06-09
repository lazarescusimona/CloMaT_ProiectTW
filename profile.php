
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>CloMatchTool</title>
      <link rel="icon" type="image/png" href="images/icon.png" />
      <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
      <link rel="stylesheet" type="text/CSS" href="css/profile2.css">
      <script src="js/lightbox-plus-jquery.min.js"></script>
      <script src="js/new_filtre.js"></script>
      <script src="js/script.js"></script>
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
                  <a href="filtre-back.php">
                  Inspiratie
                  </a>
               </li>
               <li>
                  <a href="login-switch.php">
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
      <div class="portfoliocard" style="z-index: 1;">
         <div class="coverphoto"></div>
         <div class="profile_picture"></div>
         <div class="left_col">
            <div class="following">
               <div class="follow_count">Username</div>
               <?php
                  if (isset($_SESSION['username'])) {
                    echo ($_SESSION['username']);
                  } else {
                    echo ("necunoscut");
                  }
                  ?>
            </div>
            <div class="following">
               <div class="follow_count">Email</div>
               <?php
                  if (isset($_SESSION['email'])) {
                    echo ($_SESSION['email']);
                  } else {
                    echo ("necunoscut");
                  }
                  ?>
            </div>
            <div class="following">
               <div class="follow_count">Data nasterii</div>
               <?php
                  if (isset($_SESSION['birthday'])) {
                    echo ($_SESSION['birthday']);
                  } else {
                    echo ("necunoscut");
                  }
                  ?>
            </div>
            <div class="following">
               <div class="follow_count">Gender</div>
               <?php
                  if (isset($_SESSION['sex'])) {
                    echo ($_SESSION['sex']);
                  } else {
                    echo ("necunoscut");
                  }
                  ?>
            </div>
            <div class="following">
               <button onclick="window.location.href='deconectare.php';">Logout</button>
            </div>
            <div class="following" >
               <?php require_once 'addRuda.php';?>
               <?php       
                  global $conn;
                  $conn = oci_connect('Student', 'STUDENT', 'localhost:1521/xe'); 
                  //$conn = oci_connect('student', 'student', 'localhost:1521/xe'); //simona
                  $user = $_SESSION['username'];
                       $query = oci_parse($conn, "SELECT * FROM rude where  userUtilizator = '$user'");
                       oci_execute($query);
                  ?>
               <div class="row justify-content-center">
                  <table class="table">
                     <thead>
                        <tr>
                           <th>Name Ruda</th>
                        </tr>
                     </thead>
                     <?php
                        while($row = oci_fetch_array($query)):
                        ?>
                     <tr>
                        <td><?php echo $row[1]; ?> </td>
                        <td>
                           <a href="deleteRuda.php?delete=<?php echo $row[1]; ?>" style="background-color:DodgerBlue;padding:5px 10px;font-size:13px;"> Delete </a>
                        </td>
                     </tr>
                     <?php endwhile; ?>
                  </table>
               </div>
               <div class = "row justify-content-center">
                  <form action = "" method = "POST">
                     <div class = "form-group"> <label> ID ruda </label> 
                        <input type = "text"  name = "name" class = "form-control" placeholder="username ruda" reqired>
                     </div>
                     <div class = "form-group">
                        <button type = "submit" class = "btn btn-primary" name = "save"  > Salvați </button> 
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <div class="right_col">
            <h2 class="name">
               <?php
                  if (isset($_SESSION['username'])) {
                    echo ($_SESSION['username']);
                  } else {
                    echo ("necunoscut");
                  }
                  ?>
            </h2>
            <h3 class="location">Articole salvate</h3>
            <?php
               echo '<form method="post"';
               echo '<div class = "favs">';
               if (isset($_SESSION['username'])) {
                 foreach ($favs as &$value) {
                   echo '<div class = "img-cell">';
                   echo '<a href="' . $value . '" data-lightbox = "mygallery"><img src="' . $value . '"></a> ';
                   $temp = str_replace("http://localhost/CloMaT_ProiectTW/images/", "", $value);
                   $temp = str_replace(".jpg", "", $temp);
                   echo '<input type="checkbox" class="delete-btn" name="' . $temp . '">';    
                   echo '</div>';
                 }
                 echo '<br>';
                 echo '<input type="submit" value=" Sterge articolele selectate " class="delete-btn"/>';
               }
               echo '</div>';
               echo '</form>';
               ?>
         </div>
      </div>
   </body>
</html>