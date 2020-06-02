<?php
session_start();  
class Filter
{
    public $nume_filtru;
    public $subcategorii = [];
}

function getConnection()
{
    $connection = oci_connect('student', 'STUDENT', 'localhost:1521/xe'); //Asta e pentru , Roxana
    return $connection;
}

function getFilters($connection)
{
    $nume_filtre = getNumeFiltre($connection);

    $result = [];
    foreach ($nume_filtre as &$value) {
        $query2 = "select distinct subcategorii from meniu_filtrare where nume_filtru = '$value'";
        $temp = new Filter;
        $temp->nume_filtru = $value;

        $qr = oci_parse(getConnection(), $query2);
        oci_execute($qr);
        while ($row = oci_fetch_array($qr)) {
            array_push($temp->subcategorii, $row['SUBCATEGORII']);
        }
        array_push($result, $temp);
    }
    return $result;
}


function view($data = [], $imgList = [])
{
    require_once 'filtre.php';
}


function getSelectValues($connection)
{
    $filters = [];
    foreach (getNumeFiltre($connection) as &$val) {
        if (isset($_POST[$val])) {
            $temp = new Filter;
            $temp->nume_filtru = $val;
            array_push($temp->subcategorii, $_POST[$val]);
            array_push($filters, $temp);
        }
    }
    return $filters;
}

function performSelect($connection)
{
    $temp = "";
    foreach (getSelectValues($connection) as  &$value) {
        $temp = $temp . $value->nume_filtru . " = " . "'" . $value->subcategorii[0] . "'" . " and ";
    }
    $temp = rtrim($temp, ' and ');

    if (strlen($temp) < 5) {
        $query = "select articol_path from articole";
    } else {
        $query = "select articol_path from articole where $temp";
    }
    $imgList = [];
    $qr = oci_parse(getConnection(), $query);
    oci_execute($qr);
    while ($row = oci_fetch_array($qr)) {
        array_push($imgList, $row['ARTICOL_PATH']);
    }
    return $imgList;
}

function getNumeFiltre($connection)
{
    $query = "select distinct nume_filtru from meniu_filtrare";
    $nume_filtre = [];
    $qr = oci_parse(getConnection(), $query);
    oci_execute($qr);
    while ($row = oci_fetch_array($qr)) {
        array_push($nume_filtre, $row['NUME_FILTRU']);
    }
    return $nume_filtre;
}


function index()
{
    $param = getFilters(getConnection());
    $param2 = performSelect(getConnection());
    view($param, $param2);
}


function addArticleToDB($username, $artPath)
{
    $query = "insert into ARTICOLE_PREFERATE values ('$username', '$artPath')";
    $qr = oci_parse(getConnection(), $query);
    oci_execute($qr);
}

function addArticles()
{
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    }
    //$username = $_SESSION['username']
    foreach (performSelect(getConnection()) as &$art) {
        $temp = str_replace("http://localhost/CloMaT_ProiectTW/images/", "", $art);
        $temp = str_replace(".jpg", "", $temp);
        if (isset($_POST[$temp])) {
            addArticleToDB($username, $art);
        }
    }
}

/*function getFavs($username){
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
    $username = "Roxana";
    $param = getFavs($username);
    viewFV($param);
}
indexFV();
*/

index();
addArticles();
