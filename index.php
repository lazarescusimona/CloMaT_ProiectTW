<?php
session_start();

function getConnection()
{
    $connection = oci_connect('student', 'student', 'localhost:1521/xe'); //simona
    //$connection = oci_connect('student', 'STUDENT', 'localhost:1521/xe'); //Asta e pentru , Roxana
    return $connection;
}


function view($primaGarderoda = [], $garderobaDoi = [], $garderobaTrei = [], $garderobaPatru = [] )
{
    require_once 'index-back.php';
}

function index()
{
    //$param1- prima garderoba
    $param = getMatchCuloare(getConnection());
    $param1 = getMatchCuloare(getConnection());
    $param2 = getMatchMaterial(getConnection());
    $param3 = getMatchMaterial(getConnection());

    view($param, $param1, $param2, $param3);
}
//material --------------------------------------------------------------------------------


function getMatchMaterial($connection)
{
    $material = "";
    $material_match = "";
    $garderoba = [];
    while (empty($material)) {
        $query = "SELECT MATERIAL FROM
    ( SELECT MATERIAL FROM MATCH_MATERIAL ORDER BY floor(DBMS_RANDOM.value(low => 1, high => 3)) )
    WHERE rownum = 1";
        $qr = oci_parse(getConnection(), $query);
        oci_execute($qr);
        while ($row = oci_fetch_array($qr)) {
            $material = $row['MATERIAL'];
        }
    }

    while (empty($material_match)) {
        $query1 = "SELECT MATERIAL_MATCH FROM
    ( SELECT MATERIAL_MATCH FROM MATCH_MATERIAL WHERE MATERIAL='$material' ORDER BY floor(DBMS_RANDOM.value(low => 1, high => 3)) )
    WHERE rownum = 1";
        $qr1 = oci_parse(getConnection(), $query1);
        oci_execute($qr1);
        while ($row1 = oci_fetch_array($qr1)) {
            $material_match = $row1['MATERIAL_MATCH'];
        }
    }
    // echo $culoare;
    // echo $culoare_match;

    $garderoba = getGarderobaMaterial($connection, $material, $material_match);


    return $garderoba;
}

function getGarderobaMaterial($connection, $material, $material_match)
{
    $garderobaMateriale = [];
    /*  $imbracTop = "";
    $imbracBot = "";
    $incaltari = "";
    $biju = "";*/


    //prima piesa - top
    //while (empty($imbracTop)) {
    while (count($garderobaMateriale) != 1) {
        $query = "SELECT ARTICOL_PATH FROM
    ( SELECT ARTICOL_PATH FROM ARTICOLE where SEXUL='Femei' and MATERIAL='$material' and TIP_PIESA='Imbracaminte top' 
    ORDER BY floor(DBMS_RANDOM.value(low => 1, high => 10)) )
    WHERE rownum = 1";
        $qr = oci_parse(getConnection(), $query);
        oci_execute($qr);
        while ($row = oci_fetch_array($qr)) {
            //  $imbracTop = $row['ARTICOL_PATH'];
            array_push($garderobaMateriale, $row['ARTICOL_PATH']);
        }
    }
    //a doua piesa- bottom
    //while (empty($imbracBot)) {
    while (count($garderobaMateriale) != 2) {
        $query1 = "SELECT ARTICOL_PATH FROM
    ( SELECT ARTICOL_PATH FROM ARTICOLE where SEXUL='Femei' and MATERIAL='$material_match' and TIP_PIESA='Imbracaminte bottom' 
    ORDER BY floor(DBMS_RANDOM.value(low => 1, high => 10)) )
    WHERE rownum = 1";
        $qr1 = oci_parse(getConnection(), $query1);
        oci_execute($qr1);
        while ($row1 = oci_fetch_array($qr1)) {
            //$imbracBot = $row1['ARTICOL_PATH'];
            array_push($garderobaMateriale, $row1['ARTICOL_PATH']);
        }
    }



    //a treia piesa- incaltaminte
    // while (empty($incaltari)) {
    while (count($garderobaMateriale) != 3) {
        $query2 = "SELECT ARTICOL_PATH FROM
            ( SELECT ARTICOL_PATH FROM ARTICOLE where SEXUL='Femei' and MATERIAL='$material' and TIP_PIESA='Incaltaminte' 
            ORDER BY floor(DBMS_RANDOM.value(low => 1, high => 10)) )
            WHERE rownum = 1";
        $qr2 = oci_parse(getConnection(), $query2);
        oci_execute($qr2);
        while ($row2 = oci_fetch_array($qr2)) {
            //$incaltari = $row2['ARTICOL_PATH'];
            array_push($garderobaMateriale, $row2['ARTICOL_PATH']);
        }
    }


    //a patra piesa- accesorii
    //while (empty($biju)) {
    while (count($garderobaMateriale) != 4) {
        $query3 = "SELECT ARTICOL_PATH FROM
                    ( SELECT ARTICOL_PATH FROM ARTICOLE where SEXUL='Femei' and TIP_PIESA='Accesorii' 
                    ORDER BY floor(DBMS_RANDOM.value(low => 1, high => 10)) )
                    WHERE rownum = 1";
        $qr3 = oci_parse(getConnection(), $query3);
        oci_execute($qr3);
        while ($row3 = oci_fetch_array($qr3)) {
            //$biju = $row3['ARTICOL_PATH'];
            array_push($garderobaMateriale, $row3['ARTICOL_PATH']);
        }
    }



    return $garderobaMateriale;
}







// culoare ----------------------------------------------------------------------------------

function getMatchCuloare($connection)
{
    $culoare = "";
    $culoare_match = "";
    $garderoba = [];
    while (empty($culoare)) {
        $query = "SELECT CULOARE FROM
    ( SELECT CULOARE FROM match_cromatic ORDER BY floor(DBMS_RANDOM.value(low => 1, high => 3)) )
    WHERE rownum = 1";
        $qr = oci_parse(getConnection(), $query);
        oci_execute($qr);
        while ($row = oci_fetch_array($qr)) {
            $culoare = $row['CULOARE'];
        }
    }

    while (empty($culoare_match)) {
        $query1 = "SELECT CULOARE_MATCH FROM
    ( SELECT CULOARE_MATCH FROM match_cromatic WHERE culoare='$culoare' ORDER BY floor(DBMS_RANDOM.value(low => 1, high => 3)) )
    WHERE rownum = 1";
        $qr1 = oci_parse(getConnection(), $query1);
        oci_execute($qr1);
        while ($row1 = oci_fetch_array($qr1)) {
            $culoare_match = $row1['CULOARE_MATCH'];
        }
    }
    // echo $culoare;
    // echo $culoare_match;

    $garderoba = getGarderobaCuloare($connection, $culoare, $culoare_match);


    return $garderoba;
}

function getGarderobaCuloare($connection, $culoare, $culoare_match)
{
    $garderobaCulori = [];
    /*  $imbracTop = "";
    $imbracBot = "";
    $incaltari = "";
    $biju = "";*/


    //prima piesa - top
    //while (empty($imbracTop)) {
    while (count($garderobaCulori) != 1) {
        $query = "SELECT ARTICOL_PATH FROM
    ( SELECT ARTICOL_PATH FROM ARTICOLE where SEXUL='Femei' and CULOARE='$culoare' and TIP_PIESA='Imbracaminte top' 
    ORDER BY floor(DBMS_RANDOM.value(low => 1, high => 10)) )
    WHERE rownum = 1";
        $qr = oci_parse(getConnection(), $query);
        oci_execute($qr);
        while ($row = oci_fetch_array($qr)) {
            //  $imbracTop = $row['ARTICOL_PATH'];
            array_push($garderobaCulori, $row['ARTICOL_PATH']);
        }
    }
    //a doua piesa- bottom
    //while (empty($imbracBot)) {
    while (count($garderobaCulori) != 2) {
        $query1 = "SELECT ARTICOL_PATH FROM
    ( SELECT ARTICOL_PATH FROM ARTICOLE where SEXUL='Femei' and CULOARE='$culoare_match' and TIP_PIESA='Imbracaminte bottom' 
    ORDER BY floor(DBMS_RANDOM.value(low => 1, high => 10)) )
    WHERE rownum = 1";
        $qr1 = oci_parse(getConnection(), $query1);
        oci_execute($qr1);
        while ($row1 = oci_fetch_array($qr1)) {
            //$imbracBot = $row1['ARTICOL_PATH'];
            array_push($garderobaCulori, $row1['ARTICOL_PATH']);
        }
    }



    //a treia piesa- incaltaminte
    // while (empty($incaltari)) {
    while (count($garderobaCulori) != 3) {
        $query2 = "SELECT ARTICOL_PATH FROM
            ( SELECT ARTICOL_PATH FROM ARTICOLE where SEXUL='Femei' and CULOARE='$culoare' and TIP_PIESA='Incaltaminte' 
            ORDER BY floor(DBMS_RANDOM.value(low => 1, high => 10)) )
            WHERE rownum = 1";
        $qr2 = oci_parse(getConnection(), $query2);
        oci_execute($qr2);
        while ($row2 = oci_fetch_array($qr2)) {
            //$incaltari = $row2['ARTICOL_PATH'];
            array_push($garderobaCulori, $row2['ARTICOL_PATH']);
        }
    }


    //a patra piesa- accesorii
    //while (empty($biju)) {
    while (count($garderobaCulori) != 4) {
        $query3 = "SELECT ARTICOL_PATH FROM
                    ( SELECT ARTICOL_PATH FROM ARTICOLE where SEXUL='Femei' and CULOARE='$culoare_match' and TIP_PIESA='Accesorii' 
                    ORDER BY floor(DBMS_RANDOM.value(low => 1, high => 10)) )
                    WHERE rownum = 1";
        $qr3 = oci_parse(getConnection(), $query3);
        oci_execute($qr3);
        while ($row3 = oci_fetch_array($qr3)) {
            //$biju = $row3['ARTICOL_PATH'];
            array_push($garderobaCulori, $row3['ARTICOL_PATH']);
        }
    }



    return $garderobaCulori;
}

function performSelect($connection)
{
    $query = "select articol_path from articole";
    $imgList = [];
    $qr = oci_parse(getConnection(), $query);
    oci_execute($qr);
    while ($row = oci_fetch_array($qr)) {
        array_push($imgList, $row['ARTICOL_PATH']);
    }
    return $imgList;
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







index();
addArticles();
