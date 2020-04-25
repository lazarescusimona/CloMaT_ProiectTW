
<?php        global $conn;
        //$conn = oci_connect('clomat', 'clomat', 'localhost/XE', 'Clomat');
        //$conn = oci_connect('student', 'student', 'localhost/XE'); //Asta e pentru , Simona
        $conn = oci_connect('Student', 'STUDENT', 'localhost:1521/xe'); //Asta e pentru , Roxana
        if(isset($_POST['submit'])){
            $user = $_POST['username'];
            $pass = $_POST['password'];
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
            //Redirectionam pe login.php?signup
            header("Location: ../CloMaT_ProiectTW/login.php?signup=notexists"); // eroarea signup=notexists va fi preluata in login.php
            exit();
            }
        }


 ?>