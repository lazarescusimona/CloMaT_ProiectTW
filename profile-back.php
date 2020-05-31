<?php
session_start();
function getConnection()
{
    $connection = oci_connect('student', 'STUDENT', 'localhost:1521/xe'); //Asta e pentru , Roxana
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


indexFV();
