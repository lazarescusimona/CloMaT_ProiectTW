<?php
session_start();

function getConnection()
{
    //conectarea la baza de date
    //$connection = oci_connect('student', 'student', 'localhost:1521/xe'); //simona
    $connection = oci_connect('student', 'STUDENT', 'localhost:1521/xe'); //Asta e pentru , Roxana
    return $connection;
}


function view($primaGarderoda = [], $garderobaDoi = [], $garderobaTrei = [], $garderobaPatru = [] )
{
    require_once ($_SERVER['DOCUMENT_ROOT']."/CloMaT_ProiectTW/Not_here/index-back.php");
}

function index()
{

    $param = getMatchCuloare(getConnection()); //prima garderoba - match culoare
    $param1 = getMatchCuloare(getConnection()); //a doua garderoba - match culoare
    $param2 = getMatchMaterial(getConnection()); // a treia garderoba - match material
    $param3 = getMatchMaterial(getConnection());  // a patra garderoba - match material

    view($param, $param1, $param2, $param3);
}
//material --------------------------------------------------------------------------------


function getMatchMaterial($connection)
{
    $material = "";
    $material_match = "";
    $garderoba = [];
    //generarea primului material ( prin random din tabelul MATCH_MATERIAL )
        $query = "SELECT MATERIAL FROM
    ( SELECT MATERIAL FROM MATCH_MATERIAL ORDER BY floor(DBMS_RANDOM.value(low => 1, high => 3)) )
    WHERE rownum = 1";
        $qr = oci_parse(getConnection(), $query);
        oci_execute($qr);
        $row = oci_fetch_array($qr);
            $material = $row['MATERIAL'];

//generarea celui de al doilea material, astfel incat sa aiba un match cu primul material
        $query1 = "SELECT MATERIAL_MATCH FROM
    ( SELECT MATERIAL_MATCH FROM MATCH_MATERIAL WHERE MATERIAL='$material' ORDER BY floor(DBMS_RANDOM.value(low => 1, high => 3)) )
    WHERE rownum = 1";
        $qr1 = oci_parse(getConnection(), $query1);
        oci_execute($qr1);
        $row1 = oci_fetch_array($qr1);
            $material_match = $row1['MATERIAL_MATCH'];

//apelam fc care creaza o garderoba cu materialele respective
    $garderoba = getGarderobaMaterial($connection, $material, $material_match);


    return $garderoba;
}

function getGarderobaMaterial($connection, $material, $material_match)
{
    $garderobaMateriale = [];


//crearea primei piese - imbracaminte din partea de sus cu materialul din $material
        $query = "SELECT ARTICOL_PATH FROM
    ( SELECT ARTICOL_PATH FROM ARTICOLE where SEXUL='Femei' and MATERIAL='$material' and TIP_PIESA='Imbracaminte top' 
    ORDER BY floor(DBMS_RANDOM.value(low => 1, high => 10)) )
    WHERE rownum = 1";
        $qr = oci_parse(getConnection(), $query);
        oci_execute($qr);
        $row = oci_fetch_array($qr);
            array_push($garderobaMateriale, $row['ARTICOL_PATH']);

//crearea celei de a doua piese - imbracaminte din partea de jos cu materialul din $material_match
        $query1 = "SELECT ARTICOL_PATH FROM
    ( SELECT ARTICOL_PATH FROM ARTICOLE where SEXUL='Femei' and MATERIAL='$material_match' and TIP_PIESA='Imbracaminte bottom' 
    ORDER BY floor(DBMS_RANDOM.value(low => 1, high => 10)) )
    WHERE rownum = 1";
        $qr1 = oci_parse(getConnection(), $query1);
        oci_execute($qr1);
        $row1 = oci_fetch_array($qr1);
            array_push($garderobaMateriale, $row1['ARTICOL_PATH']);



//crearea celei de a treia piesa - incaltaminte  cu materialul din $material
        $query2 = "SELECT ARTICOL_PATH FROM
            ( SELECT ARTICOL_PATH FROM ARTICOLE where SEXUL='Femei' and MATERIAL='$material' and TIP_PIESA='Incaltaminte' 
            ORDER BY floor(DBMS_RANDOM.value(low => 1, high => 10)) )
            WHERE rownum = 1";
        $qr2 = oci_parse(getConnection(), $query2);
        oci_execute($qr2);
        $row2 = oci_fetch_array($qr2);
            array_push($garderobaMateriale, $row2['ARTICOL_PATH']);


//crearea celei de a 4a piesa - accesorii
        $query3 = "SELECT ARTICOL_PATH FROM
                    ( SELECT ARTICOL_PATH FROM ARTICOLE where SEXUL='Femei' and TIP_PIESA='Accesorii' 
                    ORDER BY floor(DBMS_RANDOM.value(low => 1, high => 10)) )
                    WHERE rownum = 1";
        $qr3 = oci_parse(getConnection(), $query3);
        oci_execute($qr3);
        $row3 = oci_fetch_array($qr3);
            array_push($garderobaMateriale, $row3['ARTICOL_PATH']);




    return $garderobaMateriale;
}







// culoare ----------------------------------------------------------------------------------

function getMatchCuloare($connection)
{
    $culoare = "";
    $culoare_match = "";
    $garderoba = [];
   
    //generarea primei culori - prin random din tabelul MATCH_CULORI
        $query = "SELECT CULOARE FROM
    ( SELECT CULOARE FROM match_cromatic ORDER BY floor(DBMS_RANDOM.value(low => 1, high => 3)) )
    WHERE rownum = 1";
        $qr = oci_parse(getConnection(), $query);
        oci_execute($qr);
        $row = oci_fetch_array($qr);
            $culoare = $row['CULOARE'];


   //generarea celei de a 2 culoari astfel incat sa aiba match cu prima
        $query1 = "SELECT CULOARE_MATCH FROM
    ( SELECT CULOARE_MATCH FROM match_cromatic WHERE culoare='$culoare' ORDER BY floor(DBMS_RANDOM.value(low => 1, high => 3)) )
    WHERE rownum = 1";
        $qr1 = oci_parse(getConnection(), $query1);
        oci_execute($qr1);
        $row1 = oci_fetch_array($qr1);
            $culoare_match = $row1['CULOARE_MATCH'];

//apelam fc care creaza o garderoba cu culorile respective

    $garderoba = getGarderobaCuloare($connection, $culoare, $culoare_match);


    return $garderoba;
}

function getGarderobaCuloare($connection, $culoare, $culoare_match)
{
    $garderobaCulori = [];

//crearea primei piese - imbracaminte din partea de sus cu culoarea din $culoare

        $query = "SELECT ARTICOL_PATH FROM
    ( SELECT ARTICOL_PATH FROM ARTICOLE where SEXUL='Femei' and CULOARE='$culoare' and TIP_PIESA='Imbracaminte top' 
    ORDER BY floor(DBMS_RANDOM.value(low => 1, high => 10)) )
    WHERE rownum = 1";
        $qr = oci_parse(getConnection(), $query);
        oci_execute($qr);
        $row = oci_fetch_array($qr);
            array_push($garderobaCulori, $row['ARTICOL_PATH']);
      
 //crearea celei de a doua piese - imbracaminte din partea de jos cu culoarea din  $culoare_match
           
        $query1 = "SELECT ARTICOL_PATH FROM
    ( SELECT ARTICOL_PATH FROM ARTICOLE where SEXUL='Femei' and CULOARE='$culoare_match' and TIP_PIESA='Imbracaminte bottom' 
    ORDER BY floor(DBMS_RANDOM.value(low => 1, high => 10)) )
    WHERE rownum = 1";
        $qr1 = oci_parse(getConnection(), $query1);
        oci_execute($qr1);
        $row1 = oci_fetch_array($qr1);
            array_push($garderobaCulori, $row1['ARTICOL_PATH']);



 //crearea celei de a treia piese - incaltaminte  cu culoarea din  $culoare

        $query2 = "SELECT ARTICOL_PATH FROM
            ( SELECT ARTICOL_PATH FROM ARTICOLE where SEXUL='Femei' and CULOARE='$culoare' and TIP_PIESA='Incaltaminte' 
            ORDER BY floor(DBMS_RANDOM.value(low => 1, high => 10)) )
            WHERE rownum = 1";
        $qr2 = oci_parse(getConnection(), $query2);
        oci_execute($qr2);
        $row2 = oci_fetch_array($qr2);
            array_push($garderobaCulori, $row2['ARTICOL_PATH']);


 //crearea celei de a patra piese - accesorii cu culoarea din  $culoare_match

        $query3 = "SELECT ARTICOL_PATH FROM
                    ( SELECT ARTICOL_PATH FROM ARTICOLE where SEXUL='Femei' and CULOARE='$culoare_match' and TIP_PIESA='Accesorii' 
                    ORDER BY floor(DBMS_RANDOM.value(low => 1, high => 10)) )
                    WHERE rownum = 1";
        $qr3 = oci_parse(getConnection(), $query3);
        oci_execute($qr3);
        $row3 = oci_fetch_array($qr3);
            array_push($garderobaCulori, $row3['ARTICOL_PATH']);



    return $garderobaCulori;
}

function performSelect($connection)
{
    //selectarea articolelor care vor fi afisate pe pagina
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
    //adaugarea unui articol pt un unser in tabela de ARTICOLE_PREFERATE
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
            //adaugarea tuturor articolelor selecattae de user
            addArticleToDB($username, $art);
        }
    }
}







index();
addArticles();
