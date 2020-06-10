
<?php

        global $conn;

        //$conn = oci_connect('clomat', 'clomat', 'localhost/XE', 'Clomat');
          $conn = oci_connect('student', 'student', 'localhost/XE'); //Asta e pentru , Simona
        //$conn = oci_connect('student', 'STUDENT', 'localhost:1521/xe'); //Asta e pentru , Roxana

        
        if(isset($_POST['submit'])){

        $username = htmlspecialchars( $_POST['username']);
        $parola = htmlspecialchars( $_POST['parola']);
        $repeta_parola = htmlspecialchars( $_POST['repeta_parola']);
        $email = htmlspecialchars( $_POST['email']);
        $sex = htmlspecialchars( $_POST['sex']);
        $data = htmlspecialchars( $_POST['data']);

        $query = oci_parse($conn, "SELECT * FROM utilizatori WHERE username ='$username'");
        oci_execute($query);
        $rows1 = oci_fetch_array($query);
        if( $rows1 > 0 )
        {
            header("Location: new-account.php?account=usernameExistent"); // eroarea account=usernameExistent va fi preluata in new-account.php
            exit();
        }
        $query = oci_parse($conn, "SELECT * FROM utilizatori WHERE email ='$email'");
        oci_execute($query);
        $rows2 = oci_fetch_array($query);
        if( $rows2 > 0 )
        {
            echo "email deja folosit \n ";
            header("Location: new-account.php?account=emailExistent"); // eroarea account=emailExistent va fi preluata in new-account.php
            exit();
        }

        $ok1 = 1;
        if($parola != $repeta_parola)
        {
            $ok1 = 0;
            header("Location: new-account.php?account=paroleDiferite"); // eroarea account=paroleDiferite va fi preluata in new-account.php
            exit();
        }

        //validare sex
        $ok2 = 1;
        if($sex != 'Female' && $sex != 'Male' && $sex != 'Other'  )
        {
            $ok2 = 0;
            echo "sexul introdus nu este ca in specificatii ";
            header("Location: new-account.php?account=sex"); // eroarea account=sex va fi preluata in new-account.php
            exit();
        }

        $ok4 = 1;
        if(strlen($parola)<8)
        {
            $ok2 = 0;
            echo "sexul introdus nu este ca in specificatii ";
            header("Location: new-account.php?account=parolascurta"); // eroarea account=parola va fi preluata in new-account.php
            exit();
        }
        //validare data de nastere
        // yyyy/mm/dd
        // 2021/09/09 nu este valid, data e din viitor
        // 1999/19/33 nu este valid, nu exista luna 19 sau data de 33
        $ok3 = 1;
        //preiau data actuala a sistemul pentru a ma asigura ca utilizatorul nu
        //s-a nascut in viitor
        $data_actuala = date("Y-m-d", strtotime("now")); // '2020-06-21'
        $anAcutual = 0;
        $anAcutual = $data_actuala[0] * 1000;
        $anAcutual = $data_actuala[1] * 100 + $anAcutual;
        $anAcutual = $data_actuala[2] * 10 + $anAcutual;
        $anAcutual = $data_actuala[3] + $anAcutual;
        $ziActual = 0;
        $ziAcutual = $data_actuala[8] * 10;
        $ziAcutual = $data_actuala[9] + $ziAcutual;
        $length = strlen($data);
        $lunaActual = 0;
        $lunaAcutual = $data_actuala[5] * 10;
        $lunaAcutual = $data_actuala[6] + $lunaAcutual;

        $length = strlen($data);
        if ( ctype_digit($data[0]) && ctype_digit($data[1]) &&
             ctype_digit($data[2]) && ctype_digit($data[3]) && $data[4] == '/')
             {
                    $an = 0;
                    $an = $data[0] * 1000;
                    $an = $data[1] * 100 + $an;
                    $an = $data[2] * 10 + $an;
                    $an = $data[3] + $an;

                    if ($an > $anAcutual)
                    {
                        header("Location: new-account.php?account=formatdata"); // eroarea account=formatdata va fi preluata in new-account.php
                        exit();
                    }
                 //urmeaza o cifra sau doua '/' o cifra sau doua
                 if($length == 8) // 1999/9/9
                 {
                     if(ctype_digit($data[5]) && $data[6] == '/' && ctype_digit($data[7]))
                     {
                         //ma asigur ca sunt din trecut
                         $zi = $data[7];
                         $luna = $data[5];
                         if(($an == $anAcutual && $luna == $lunaActual && $zi < $ziActual) ||
                         ($an == $anAcutual && $luna > $lunaActual))
                         {
                            $ok3=0;
                            echo "data de nastere nu este in trecut ";
                            header("Location: new-account.php?account=formatdata"); // eroarea account=formatdata va fi preluata in new-account.php
                            exit();
                         }
                     }
                     else
                     {
                        $ok3=0;
                        echo "data de nastere nu respecta formatul din specificatii ";
                        header("Location: new-account.php?account=formatdata"); // eroarea account=formatdata va fi preluata in new-account.php
                        exit();
                     }
                 }
                 else
                 if($length == 9) // 1999/09/9 sau 1999/9/09
                 {
                    if(ctype_digit($data[5]) && $data[6] == '/' && ctype_digit($data[7]) && ctype_digit($data[8])) //1999/7/12
                    {
                        //ma asigur ca sunt din trecut
                        $zi = $data[7]*10 + $data[8];
                        $luna = $data[5];
                        if(($an == $anAcutual && $luna == $lunaActual && $zi < $ziActual) ||
                        ($an == $anAcutual && $luna > $lunaActual)|| $luna >12 || $zi > 31)
                        {
                           $ok3=0;
                           header("Location: new-account.php?account=formatdata"); // eroarea account=formatdata va fi preluata in new-account.php
                           exit();
                        }
                    }
                    else
                    if(ctype_digit($data[5])  && ctype_digit($data[6]) && $data[7] == '/' && ctype_digit($data[8])) //1999/07/1
                    {
                        //ma asigur ca sunt din trecut
                        $zi = $data[8];
                        $luna = $data[5]*10 + $data[6];
                        if(($an == $anAcutual && $luna == $lunaActual && $zi < $ziActual) ||
                        ($an == $anAcutual && $luna > $lunaActual)
                        || $luna >12 || $zi > 31)
                        {
                           $ok3=0;
                           header("Location: new-account.php?account=formatdata"); // eroarea account=formatdata va fi preluata in new-account.php
                           exit();
                        }
                    }
                    else
                    {
                        $ok3=0;
                        header("Location: new-account.php?account=formatdata"); // eroarea account=formatdata va fi preluata in new-account.php
                        exit();
                    }
                 }
                 else
                 if($length == 10) // 1999/09/09
                 {
                    if(ctype_digit($data[5]) &&ctype_digit($data[6]) && $data[7] == '/' && ctype_digit($data[8]) && ctype_digit($data[9]))
                    {
                        //ma asigur ca sunt din trecut
                        //am uitat sa implementez...
                    }
                    else
                    {
                        $ok3=0;
                        header("Location: new-account.php?account=formatdata"); // eroarea account=formatdata va fi preluata in new-account.php
                        exit();
                    }
                 }
                
             }
             else
             {
                 $ok3=0;
                 header("Location: new-account.php?account=formatdata"); // eroarea account=formatdata va fi preluata in new-account.php
                 exit();
             }

        //timpul inserarii daca toate conditiile sunt valide
        if($rows1 == 0 && $rows2 == 0 && $ok1 == 1 && $ok2 == 1 && $ok3 == 1)
        {
        $insert = oci_parse($conn, 'insert into utilizatori (username,
                                                        parola,
                                                        email,
                                                        data_nasterii,
                                                        sex,
                                                        verification_key,
                                                        confirmed_mail,
                                                        tip_utilizator) 
                                                        values 
                                                        (:username,
                                                        :parola,
                                                        :email,
                                                        TO_DATE(:data_nasterii,:format),
                                                        :sex,
                                                        :validation_key,
                                                        :confirmed,
                                                        :tip_utilizator)');
        
        //generez o cheie unica de confirmare a emailului
        // o introduc in tabel si astept ca utilizatorul sa introduca cheia
        $validation_key = md5(time().$username);
        $confirmed = 0;
        $tip_utilizator ='user';

        //folosesc o functie hash pt a securiza parola
        $parola = md5($parola);
        
        oci_bind_by_name($insert, ':tip_utilizator', $tip_utilizator);
        oci_bind_by_name($insert, ':validation_key', $validation_key);
        oci_bind_by_name($insert, ':confirmed', $confirmed);
        oci_bind_by_name($insert, ':username', $username);
        oci_bind_by_name($insert, ':parola', $parola);
        oci_bind_by_name($insert, ':email', $email);
        oci_bind_by_name($insert, ':data_nasterii', $data);
        oci_bind_by_name($insert, ':sex', $sex);
        $format = 'yyyy/mm/dd';
        oci_bind_by_name($insert, ':format', $format);

        $r = oci_execute($insert); //executa inserarea + commit
        //header("Location: new-account.php?account=succes"); //  account=succes va fi preluata in new-account.php
        session_start();
        /*
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['birthday'] = $data;
        $_SESSION['sex'] = $sex;
        $_SESSION['tip_utilizator']=$tip_utilizator;
        //verific existenta rudelor 
        $query = oci_parse($conn, "SELECT * FROM rude WHERE userutilizator = '$username'");
                oci_execute($query);
                if( ! oci_fetch_array($query) ){
                  unset($_SESSION['areRuda']);
                }
                else
                {
                  $_SESSION['areRuda']=1;
                }*/
        //trimitere mail de confirmare
        $destinatar = $email;
        $subiect = "email verification";
        //SENSITIVE LINK
        //<a href ="http://www.example.com">www.example.com</a>
         $message = "<a href='http://localhost/CloMaT_ProiectTW/verify.php?vkey=$validation_key'>Register Account </a>";

        $headers = "From: salavastruroxanamariagm@gmail.com \r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        mail($destinatar, $subiect, $message, $headers);

        header("location: thankyou.php");
        exit();
        }
    }

 ?>