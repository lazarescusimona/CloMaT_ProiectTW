<?php 
    session_start();
    global $conn;
	$conn = oci_connect('student', 'student', 'localhost/XE');


    if(isset($_POST["Export"])){
     

        $stid = oci_parse($conn, 'SELECT ID, NUME_FILTRU, SUBCATEGORII FROM STUDENT.MENIU_FILTRARE ORDER BY 1');
	oci_execute($stid);
	$myfile = fopen("filtre.csv", "w") or die("Unable to open file!");
	fwrite($myfile, "ID, NUME_FILTRU, SUBCATEGORII\n");
	while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
	fwrite($myfile, $row[0] . ',' . $row[1] . ',' . $row[2] . "\n");
    }
    oci_free_statement($stid);
    oci_close($conn);
    $_SESSION['message'] = "Filtre exportate cu succes !"; 
    fclose($myfile);
    
    header('location: export.php');
       
   } 

       

?>

