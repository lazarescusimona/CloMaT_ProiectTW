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
    
    //Edit section
    if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = oci_parse($conn, "SELECT * FROM STUDENT.MENIU_FILTRARE WHERE ID=$id");
        oci_execute($record);
        $n = oci_fetch_array($record);
		$nume_filtru = $n['NUME_FILTRU'];
        $subcategorii = $n['SUBCATEGORII'];
        $id=$n['ID'];

	}

    //Save section
	if (isset($_POST['save'])) {
		$nume_filtru= htmlspecialchars($_POST['nume_filtru']);
        $subcategorii = htmlspecialchars($_POST['subcategorii']);
        if(empty($nume_filtru) || empty($subcategorii)){
            $_SESSION['message'] = "Toate campurile trebuie completate!"; 
            header('location: http://localhost/CloMaT_ProiectTW/admin_filtre.php');
            
        }
        else{
            $query = oci_parse($conn,"Insert into STUDENT.MENIU_FILTRARE (NUME_FILTRU,SUBCATEGORII) values (:nume_filtru, :subcategorii)"); 
            oci_bind_by_name($query, ':nume_filtru', $nume_filtru);
            oci_bind_by_name($query, ':subcategorii', $subcategorii);
            oci_execute($query);
            $_SESSION['message'] = "Filter saved"; 
            header('location: http://localhost/CloMaT_ProiectTW/admin_filtre.php');
        }
    }

    $sql = 'SELECT * FROM STUDENT.MENIU_FILTRARE ORDER BY ID';
    $stid = oci_parse($conn, $sql);
    oci_execute($stid);

    //update filtre
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $nume_filtru = htmlspecialchars($_POST['nume_filtru']);
        $subcategorii = htmlspecialchars($_POST['subcategorii']);
        if(empty($nume_filtru) || empty($subcategorii)){
            $_SESSION['message'] = "Toate campurile trebuie completate!"; 
            header('location: http://localhost/CloMaT_ProiectTW/admin_filtre.php');
            
        }
        else{
            $query=oci_parse($conn, "UPDATE STUDENT.MENIU_FILTRARE SET NUME_FILTRU='$nume_filtru', SUBCATEGORII='$subcategorii' WHERE id=$id");
            oci_execute($query);
            $_SESSION['message'] = "Filter updated!"; 
            header('location: http://localhost/CloMaT_ProiectTW/admin_filtre.php');
        }
    }
    
    //delete filre
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $query=oci_parse($conn, "DELETE FROM STUDENT.MENIU_FILTRARE WHERE id=$id");
        oci_execute($query);
        $_SESSION['message'] = "Filter deleted!"; 
        header('location: http://localhost/CloMaT_ProiectTW/admin_filtre.php');
    }
?>

