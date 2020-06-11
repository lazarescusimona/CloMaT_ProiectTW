<?php
session_start();
class Filter
{
    public $nume_filtru;
    public $subcategorii = [];
}

function getConnection()
{
    //conexiunea la baze de date
    //$connection = oci_connect('student', 'student', 'localhost:1521/xe'); //simona
    $connection = oci_connect('student', 'STUDENT', 'localhost:1521/xe'); //Asta e pentru , Roxana
    return $connection;
}

function getFilters($connection)
{
    //selectarea filtrelor si asubcategoriilor pentru crearea meniului de filtarre din stanga paginii de pe pagina de filtre-back
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
    require_once($_SERVER['DOCUMENT_ROOT'] . "/CloMaT_ProiectTW/Not_here/filtre.php");
}


function getSelectValues($connection)
{
    //crearea unei liste cu toate datele necesare meniului de filtre
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
    //prelucrarea select-ului in urma alegerii filtrelor de catre user
    $temp = "";
    foreach (getSelectValues($connection) as  &$value) {
        $temp = $temp . $value->nume_filtru . " = " . "'" . $value->subcategorii[0] . "'" . " and ";
        $fil = $value->subcategorii[0];
        $query_zi = oci_parse(getConnection(), "SELECT * FROM STUDENT.STATISTICA_FILTRE WHERE FILTRU = '$fil'");
        oci_execute($query_zi);
        if (!oci_fetch_array($query_zi)) {
            $new_query = oci_parse(getConnection(), "INSERT INTO STUDENT.STATISTICA_FILTRE(FILTRU,NR_CAUTARI) VALUES ('$fil',1)");
            oci_execute($new_query);
        } else {
            $new_query = oci_parse(getConnection(), "UPDATE STUDENT.STATISTICA_FILTRE SET NR_CAUTARI=NR_CAUTARI+1 WHERE FILTRU = '$fil'");
            oci_execute($new_query);
        }
    }
    $temp = rtrim($temp, ' and ');

    //selectarea articolelor care respecta acele filtre alese de user
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

    //returnarea listei cu articole care trebuie sa fie afisate pe pagina filtre-back.php
    return $imgList;
}

function getNumeFiltre($connection)
{
    //selectarea numelor filtrelor din baza de date
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
    //generarea datelor necesare
    $param = getFilters(getConnection()); //selectarea filtrelor pt meniul de filtrare

    $param2 = performSelect(getConnection());
    $param2Copy = $param2;
    // in param2 e lista cu toate articolele care respecta filtrele cerute

    $param3 = getFavoriteRelatives(getConnection(), $param2Copy);
    $param3Copy = $param3;
    //param3 - lista cu articolelecare respecta filtrele cerute si se afla in lista de favorite a rudelor

    $param4 = array_filter($param2Copy, function ($item) use (&$param3Copy) {
        $idx = array_search($item, $param3Copy);
        if ($idx !== false) unset($param3Copy[$idx]);
        return $idx === false;
    }); //aici efectiv se face o diferenta intre lista cu toate articolele si cele preferate de rude

    view($param, $param3, $param4);
}

function getFavoriteRelatives($connection, $imgList = [])
{
    //in fucntia asta returnez lista cu articolele care respecta filtrele cerute si sunt si printre preferatele user-ului logat
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
    $lista_favorite_rude = array_unique($lista_favorite_rude);
    return $lista_favorite_rude;
}


function addArticleToDB($username, $artPath)
{
    //cu functia aadaug un nou articol pt un naumit user in tabelul "ARTICOLE_PREFERATE"
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
            //pt fiecare articol selectat ca fiind salvat,a cesta se salveaza in tabela
            addArticleToDB($username, $art);
        }
    }
}


index();
addArticles();
