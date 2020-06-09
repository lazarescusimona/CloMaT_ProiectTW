
<?php       
         global $conn;
        //$conn = oci_connect('clomat', 'clomat', 'localhost/XE', 'Clomat');
        $conn = oci_connect('student', 'student', 'localhost/XE'); //Asta e pentru , Simona
        //$conn = oci_connect('Student', 'STUDENT', 'localhost:1521/xe'); //Asta e pentru , Roxana
        if(isset($_POST['submit'])){
            $user = $_POST['username'];
            $pass = $_POST['password'];
            if((!empty($user)) && (!empty($pass)))
            {
              $pass = md5($pass);
              $query = oci_parse($conn, "SELECT * FROM utilizatori WHERE username = '$user' AND parola = '$pass'");
              oci_execute($query);
              if( $rows = oci_fetch_array($query) ){

                session_start();
                $_SESSION['username']=$user;
                $_SESSION['email'] = $rows[3];
                $_SESSION['birthday'] = $rows[4];
                $_SESSION['sex'] = $rows[5];
              
                //verific existenta rudelor 
                $userul = $_SESSION['username'];
                $query = oci_parse($conn, "SELECT * FROM rude WHERE userutilizator = '$userul'");
                oci_execute($query);
                if( ! oci_fetch_array($query) ){
                  unset($_SESSION['areRuda']);
                }
                else
                {
                  $_SESSION['areRuda']=1;
                }
                $_SESSION['tip_utilizator'] = $rows[8];

                if($rows[8] == 'user'){
                  $zi=strtoupper(date("d-M-y"));
                  $query_zi=oci_parse($conn, "SELECT * FROM STUDENT.STATISTICA_VIZITATORI WHERE ZIUA = '$zi'");
                  oci_execute($query_zi);
                  if( ! oci_fetch_array($query_zi) ){
                    $new_query= oci_parse($conn, "INSERT INTO STUDENT.STATISTICA_VIZITATORI(ZIUA,NR_UTILIZATORI) VALUES ('$zi',1)");
                    oci_execute($new_query);
                  }
                  else{
                    $new_query= oci_parse($conn, "UPDATE STUDENT.STATISTICA_VIZITATORI SET NR_UTILIZATORI=NR_UTILIZATORI+1 WHERE ZIUA = '$zi'");
                    oci_execute($new_query);
                  }


                  header("location: profile-back.php");
                }
                else{
                  if($rows[8] == 'admin')
                    header("location: admin.php");
                }
              }
              else{
              //Redirectionam pe login.php?signup
              header("Location: login.php?signup=notexists"); // eroarea signup=notexists va fi preluata in login.php
              exit();
            }
            }
        }


 ?>