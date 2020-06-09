<?php
if(isset($_GET['vkey']))
{
    $vkey = $_GET['vkey'];
    global $conn;
    //$conn = oci_connect('Student', 'STUDENT', 'localhost:1521/xe'); //Asta e pentru , Roxana
    $conn = oci_connect('student', 'student', 'localhost:1521/xe'); //Asta e pentru , simona
    $query = oci_parse($conn, "SELECT * FROM utilizatori WHERE verification_key ='$vkey'");
    oci_execute($query);
    $rows1 = oci_fetch_array($query);
    if( $rows1 > 1 )
    {
        $insert = oci_parse($conn, 'update utilizatori set confirmed_mail = 1 where 
                                                        verification_key = :vkey');
        oci_bind_by_name($insert, ':vkey', $vkey);
        $r = oci_execute($insert); //executa inserarea + commit
        session_start();
        $_SESSION['username'] = $rows1[0];
        $_SESSION['email'] = $rows1[2];
        $_SESSION['birthday'] = $rows1[3];
        $_SESSION['sex'] = $rows1[4];

        header("location: profile-back.php");

    }
    else
    {
        echo "something went wrong bro :(";
    }
}
else
{
    die("NU ai ce cauta pe pagina asta");
}

?>
<html>