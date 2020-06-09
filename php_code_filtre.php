<?php 
    session_start();
    global $conn;
    $conn = oci_connect('student', 'STUDENT', 'localhost:1521/xe');
    //$conn = oci_connect('student', 'student', 'localhost/XE');

	// initialize variables
	$nume_filtru = "";
    $subcategorii = "";
   
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$nume_filtru= $_POST['nume_filtru'];
        $subcategorii = $_POST['subcategorii'];
        $query = oci_parse($conn,"Insert into STUDENT.MENIU_FILTRARE (NUME_FILTRU,SUBCATEGORII) values ('$nume_filtru', '$subcategorii')"); 
        oci_execute($query);
		$_SESSION['message'] = "Filter saved"; 
		header('location: admin_filtre.php');
    }

    $sql = 'SELECT * FROM STUDENT.MENIU_FILTRARE';
    $stid = oci_parse($conn, $sql);
    oci_execute($stid);

    //update filtre
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $nume_filtru = $_POST['nume_filtru'];
        $subcategorii = $_POST['subcategorii'];
        $query=oci_parse($conn, "UPDATE STUDENT.MENIU_FILTRARE SET NUME_FILTRU='$nume_filtru', SUBCATEGORII='$subcategorii' WHERE id=$id");
        oci_execute($query);
        $_SESSION['message'] = "Filter updated!"; 
        header('location: admin_filtre.php');
    }
    
    //delete filre
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $query=oci_parse($conn, "DELETE FROM STUDENT.MENIU_FILTRARE WHERE id=$id");
        oci_execute($query);
        $_SESSION['message'] = "Filter deleted!"; 
        header('location: admin_filtre.php');
    }
?>

