
<?php
session_start();

if(isset($_GET['delete']))
{
    $conn = oci_connect('student', 'student', 'localhost:1521/xe'); //simona
   // $conn = oci_connect('student', 'STUDENT', 'localhost:1521/xe'); //Asta e pentru , Roxana
    $id = $_GET['delete'];
    $userul = $_SESSION['username'];
    $query = oci_parse($conn, "delete from rude where userUtilizator = :username and ruda = :ruda");
    oci_bind_by_name($query, ':username', $userul);
    oci_bind_by_name($query, ':ruda', $id);
    oci_execute($query);
    $query = oci_parse($conn, "delete from rude where userUtilizator = :username and ruda = :ruda");
    oci_bind_by_name($query, ':username', $id);
    oci_bind_by_name($query, ':ruda', $userul);
    oci_execute($query);
    //daca nu mai are rude, acest utilizator, fac unset la $_SESSION['areRude']
    $query = oci_parse($conn, "SELECT * FROM rude WHERE userutilizator = '$userul'");
    oci_execute($query);
    if( ! oci_fetch_array($query) ){
        unset($_SESSION['areRuda']);
    }

    header("Location: profile-back.php?");
}