
<?php
        session_start();
        global $conn;
        //$conn = oci_connect('clomat', 'clomat', 'localhost/XE', 'Clomat');
        $conn = oci_connect('student', 'student', 'localhost/XE'); //Asta e pentru test
        if(isset($_POST['submit'])){
            $user = $_POST['username'];
            $pass = $_POST['password'];
            //$s = oci_parse($conn, "select username,parola from utilizatori where username='$user' and parola='$pass'");       
            $query = oci_parse($conn, "SELECT * FROM utilizatori WHERE username = '$user' AND parola = '$pass'");
            oci_execute($query);
            if( $rows = oci_fetch_array($query) ){
              //... set session variables, login, etc...
              $_SESSION['username']=$user;
              $_SESSION['password']=$pass;
              //$_SESSION['time_start_login'] = time();
              header("location: filtre.html");
            }
            else{
            echo "wrong password or username";
            session_destroy();
            }
            /*oci_execute($s);
            $row = oci_fetch($s);
            if($row>0){
                    $_SESSION['username']=$user;
                    //$_SESSION['time_start_login'] = time();
                    header("location: filtre.html");
            }else{
                echo "wrong password or username";
                session_destroy();
            }*/
        }


 ?>


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CloMatchTool</title>
  <link rel="icon" type="image/png" href="images/icon.png" /> 
  <link rel="stylesheet" type="text/css" href="css/filtre.css">
  <link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
  <script src="js/lightbox-plus-jquery.min.js"></script>
    <link rel="stylesheet" href="login_css/style.css" type="text/css" >
    
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
        <a href="login.html">
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


    <div id="container">
        <div id="login-container">
            <form action="#" method="POST" id="form">
                
                <div class="title">
                    Log in
                </div>
                
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Enter username...">
                
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="text" id="password" name="password" class="form-control" placeholder="Enter password...">
                
                </div>

                <div class="form-group">
                
                    <!--<input type="button" value="Login >>" id="submit" onclick="authorize()" class="form-control" class="form-btn">-->
                    <input type="submit" name="submit" value="Login >>" id="submit"class="form-control" class="form-btn">
                
                </div>

                <div class="form-group">
                
                    <a href="new-account.html">
                    <input type="button" value="New account" id="submit"  class="form-control" class="form-btn">
                    </a>
                </div>
            </form>
        </div>
    </div>
    <script src="js/login_js/index.js"></script>

</body>
</html>