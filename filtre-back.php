<?php
session_start();
class Filter
{
    public $nume_filtru;
    public $subcategorii = [];
}

function getConnection()
{
    //$connection = oci_connect('student', 'student', 'localhost:1521/xe'); //simona
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


function view($data = [], $imgListRelatives = [], $imgListOther = [])
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
    $param2Copy = $param2;
    // in param2 e lista cu toate imaginile
    $param3 = getFavoriteRelatives(getConnection(), $param2Copy); //pe asta il trimiti
    $param3Copy = $param3;
    //param3 - lista cu favoritele rudelor

    $param4 = array_filter($param2Copy, function ($item) use (&$param3Copy) {
        $idx = array_search($item, $param3Copy);
        // remove it from $b if found
        if ($idx !== false) unset($param3Copy[$idx]);
        // keep the item if not found
        return $idx === false;
    });

    view($param, $param3, $param4);
}

function getFavoriteRelatives($connection, $imgList = [])
{
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    }

    $lista_favorite_rude = [];

    if (isset($_SESSION['areRuda'])) {
        $query = "select RUDA from rude where USERUTILIZATOR = '$username'";
        $qr = oci_parse(getConnection(), $query);
        oci_execute($qr);
        while ($row = oci_fetch_array($qr)) {
            $ruda_name = $row['RUDA'];
            foreach ($imgList as &$value) {
                $query1 = " select * from articole_preferate where USERNAME ='$ruda_name' and ARTICOL_PATH ='$value'";
                $qr1 = oci_parse(getConnection(), $query1);
                oci_execute($qr1);
                if (!oci_fetch_array($qr1)) {
                    //nu faci nic
                } else {
                    array_push($lista_favorite_rude, $value);
                }
            }
        }
    }
    $lista_favorite_rude=array_unique($lista_favorite_rude);
    return $lista_favorite_rude;
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
