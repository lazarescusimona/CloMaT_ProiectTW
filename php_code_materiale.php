<?php 
    session_start();
    global $conn;
    //$conn = oci_connect('student', 'STUDENT', 'localhost:1521/xe');
    $conn = oci_connect('student', 'student', 'localhost/XE');

	// initialize variables
	$material = "";
    $material_match = "";
   
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$material= $_POST['material'];
        $material_match = $_POST['material_match'];
        if(empty($material) || empty($material_match) ){
            $_SESSION['message'] = "Toate campurile trebuie completate!"; 
            header('location: match_material.php');
        }
        else{
            $query = oci_parse($conn,"Insert into STUDENT.MATCH_MATERIAL (MATERIAL,MATERIAL_MATCH) values ('$material', '$material_match')"); 
            oci_execute($query);
            $query2 = oci_parse($conn,"Insert into STUDENT.MATCH_MATERIAL (MATERIAL,MATERIAL_MATCH) values ('$material_match', '$material')"); 
            oci_execute($query2);
            $_SESSION['message'] = "Match saved"; 
            header('location: match_material.php');
        }
    }

    $sql = 'SELECT * FROM STUDENT.MATCH_MATERIAL ORDER BY ID';
    $stid = oci_parse($conn, $sql);
    oci_execute($stid);

    //update match
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $material = $_POST['material'];
        $material_match = $_POST['material_match'];
        if(empty($material_match) || empty($material)){
            $_SESSION['message'] = "Toate campurile trebuie completate!"; 
            header('location: match_material.php');
            
        }
        else{
            if($id%2==1)
            {
                $query=oci_parse($conn, "UPDATE STUDENT.MATCH_MATERIAL SET MATERIAL='$material', MATERIAL_MATCH='$material_match' WHERE id=$id");
                oci_execute($query);
                $query2=oci_parse($conn, "UPDATE STUDENT.MATCH_MATERIAL SET MATERIAL='$material_match', MATERIAL_MATCH='$material' WHERE id=$id+1");
                oci_execute($query2);
            }
            else{
                $query=oci_parse($conn, "UPDATE STUDENT.MATCH_MATERIAL SET MATERIAL='$material', MATERIAL_MATCH='$material_match' WHERE id=$id");
                oci_execute($query);
                $query2=oci_parse($conn, "UPDATE STUDENT.MATCH_MATERIAL SET MATERIAL='$material_match', MATERIAL_MATCH='$material' WHERE id=$id-1");
                oci_execute($query2);
            }
            $_SESSION['message'] = "Match updated!"; 
            header('location: match_material.php');
        }
    }
    
    //delete match
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        if($id%2==1)
        {
            $query=oci_parse($conn, "DELETE FROM STUDENT.MATCH_MATERIAL WHERE id=$id");
            oci_execute($query);
            $query2=oci_parse($conn, "DELETE FROM STUDENT.MATCH_MATERIAL WHERE id=$id+1");
            oci_execute($query2);
        }
        else{
            $query=oci_parse($conn, "DELETE FROM STUDENT.MATCH_MATERIAL WHERE id=$id");
            oci_execute($query);
            $query2=oci_parse($conn, "DELETE FROM STUDENT.MATCH_MATERIAL WHERE id=$id-1");
            oci_execute($query2);
        }

        $_SESSION['message'] = "Match deleted!"; 
        header('location: match_material.php');
    }
?>

