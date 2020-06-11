<?php 
    session_start();
    global $conn;
    $conn = oci_connect('student', 'STUDENT', 'localhost:1521/xe');
    //$conn = oci_connect('student', 'student', 'localhost/XE');


    if(isset($_POST["ExportFiltre"])){
     

        $stid = oci_parse($conn, 'SELECT ID, NUME_FILTRU, SUBCATEGORII FROM STUDENT.MENIU_FILTRARE ORDER BY 1');
	oci_execute($stid);
	$myfile = fopen("http://localhost/CloMaT_ProiectTW/filtre.csv", "w") or die("Unable to open file!");
	fwrite($myfile, "ID, NUME_FILTRU, SUBCATEGORII\n");
	while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
	fwrite($myfile, $row[0] . ',' . $row[1] . ',' . $row[2] . "\n");
    }
    oci_free_statement($stid);
    oci_close($conn);
    $_SESSION['message'] = "Filtre exportate cu succes !"; 
    fclose($myfile);
    
    header('location: http://localhost/CloMaT_ProiectTW/export.php');
       
   } 

   if(isset($_POST["ExportUtilizatori"])){
     

    $stid = oci_parse($conn, 'SELECT ID,USERNAME,PAROLA,EMAIL,DATA_NASTERII,SEX,CONFIRMED_MAIL,VERIFICATION_KEY FROM STUDENT.UTILIZATORI ORDER BY 1');
    oci_execute($stid);
    $myfile = fopen("http://localhost/CloMaT_ProiectTW/users.csv", "w") or die("Unable to open file!");
    fwrite($myfile, "ID,USERNAME,PAROLA,EMAIL,DATA_NASTERII,SEX,CONFIRMED_MAIL,VERIFICATION_KEY\n");
    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
    fwrite($myfile, $row[0] . ',' . $row[1] . ',' . $row[2] . $row[3] . ',' . $row[4] . ',' . $row[5] . $row[6] . "\n");
    }
    oci_free_statement($stid);
    oci_close($conn);
    $_SESSION['message'] = "Date utilizatori exportate cu succes !"; 
    fclose($myfile);

    header('location: http://localhost/CloMaT_ProiectTW/export.php');
   
    } 


    if(isset($_POST["ExportArticole"])){
     

        $stid = oci_parse($conn, 'SELECT ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,TIP_PIESA,ANOTIMP FROM STUDENT.ARTICOLE ORDER BY 1');
        oci_execute($stid);
        $myfile = fopen("http://localhost/CloMaT_ProiectTW/articole.csv", "w") or die("Unable to open file!");
        fwrite($myfile, "ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,TIP_PIESA,ANOTIMP\n");
        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
        fwrite($myfile, $row[0] . ',' . $row[1] . ',' . $row[2] . $row[3] . ',' . $row[4] . ',' . $row[5] . $row[6] . "\n");
        }
        oci_free_statement($stid);
        oci_close($conn);
        $_SESSION['message'] = "Date despre articole exportate cu succes !"; 
        fclose($myfile);
    
        header('location: http://localhost/CloMaT_ProiectTW/export.php');
       
        } 


        if(isset($_POST["ExportPreferinte"])){
     

            $stid = oci_parse($conn, 'SELECT USERNAME,ARTICOL_PATH FROM STUDENT.ARTICOLE_PREFERATE');
            oci_execute($stid);
            $myfile = fopen("http://localhost/CloMaT_ProiectTW/articole_preferate.csv", "w") or die("Unable to open file!");
            fwrite($myfile, "USERNAME,ARTICOL_PATH\n");
            while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
            fwrite($myfile, $row[0] . ',' . $row[1] . "\n");
            }
            oci_free_statement($stid);
            oci_close($conn);
            $_SESSION['message'] = "Date despre articolele userilor preferate exportate cu succes !"; 
            fclose($myfile);
        
            header('location: http://localhost/CloMaT_ProiectTW/export.php');
           
            } 
       

?>

