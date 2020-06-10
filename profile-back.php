<?php
session_start();
function getConnection()
{
   // $connection = oci_connect('student', 'STUDENT', 'localhost:1521/xe'); //Asta e pentru , Roxana
    $connection = oci_connect('student', 'student', 'localhost:1521/xe'); //Asta e pentru , Simona
    return $connection;
}

function getFavs($username)
{
    $query = "select distinct articol_path from articole_preferate where username = '$username'";
    $favs = [];
    $qr = oci_parse(getConnection(), $query);
    oci_execute($qr);
    while ($row = oci_fetch_array($qr)) {
        array_push($favs, $row['ARTICOL_PATH']);
    }
    return $favs;
}

function viewFV($favs = [])
{
    require_once 'profile.php';
}

function indexFV()
{
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $param = getFavs($username);
        viewFV($param);
    }
}

function deleteArticleToDB($username, $artPath)
{
    $query = "delete from ARTICOLE_PREFERATE where username ='$username' and articol_path = '$artPath'";
    $qr = oci_parse(getConnection(), $query);
    oci_execute($qr);
}

function deleteArticles()
{
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    }
    //$username = $_SESSION['username']
    foreach (getFavs($username) as &$art) {
        $temp = str_replace("http://localhost/CloMaT_ProiectTW/images/", "", $art);
        $temp = str_replace(".jpg", "", $temp);
        if (isset($_POST[$temp])) {
            deleteArticleToDB($username, $art);
            $page = $_SERVER['PHP_SELF'];
            echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
        }
    }
    //header("location: profile-back.php");
    //header('Location: '.$_SERVER['PHP_SELF']);
   
}

 

indexFV();
deleteArticles();
//header('Location: '.$_SERVER['PHP_SELF']);