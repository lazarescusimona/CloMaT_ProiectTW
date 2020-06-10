<?php 
    session_start();
    global $conn;
    
    //$conn = oci_connect('student', 'STUDENT', 'localhost:1521/xe');
    $conn = oci_connect('student', 'student', 'localhost/XE');

	// initialize variables
	$culoare = "";
    $culoare_match = "";
   
	$id = 0;
	$update = false;

    //Edit section
    if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = oci_parse($conn, "SELECT * FROM STUDENT.MATCH_CROMATIC WHERE ID=$id");
        oci_execute($record);
        $n = oci_fetch_array($record);
		$culoare = $n['CULOARE'];
        $culoare_match = $n['CULOARE_MATCH'];
        $id=$n['ID'];

	}

    //Save section
	if (isset($_POST['save'])) {
		$culoare= htmlspecialchars($_POST['culoare']);
        $culoare_match = htmlspecialchars($_POST['culoare_match']);
        if(empty($culoare) || empty($culoare_match)){
            $_SESSION['message'] = "Toate campurile trebuie completate!"; 
            header('location: match_culori.php');
            
        }
        else{
            $query = oci_parse($conn,"Insert into STUDENT.MATCH_CROMATIC (CULOARE,CULOARE_MATCH) values ('$culoare', '$culoare_match')"); 
            oci_execute($query);
            $query2 = oci_parse($conn,"Insert into STUDENT.MATCH_CROMATIC (CULOARE,CULOARE_MATCH) values ('$culoare_match', '$culoare')"); 
            oci_execute($query2);
            $_SESSION['message'] = "Match saved"; 
            header('location: match_culori.php');
        }
    }

    $sql = 'SELECT * FROM STUDENT.MATCH_CROMATIC ORDER BY ID';
    $stid = oci_parse($conn, $sql);
    oci_execute($stid);

    //update match
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $culoare = htmlspecialchars($_POST['culoare']);
        $culoare_match = htmlspecialchars($_POST['culoare_match']);
        if(empty($culoare) || empty($culoare_match)){
            $_SESSION['message'] = "Toate campurile trebuie completate!"; 
            header('location: match_culori.php');
            
        }
        else{
            if($id%2==1)
            {
                $query=oci_parse($conn, "UPDATE STUDENT.MATCH_CROMATIC SET CULOARE='$culoare', CULOARE_MATCH='$culoare_match' WHERE id=$id");
                oci_execute($query);
                $query2=oci_parse($conn, "UPDATE STUDENT.MATCH_CROMATIC SET CULOARE='$culoare_match', CULOARE_MATCH='$culoare' WHERE id=$id+1");
                oci_execute($query2);
            }
            else{
                $query=oci_parse($conn, "UPDATE STUDENT.MATCH_CROMATIC SET CULOARE='$culoare', CULOARE_MATCH='$culoare_match' WHERE id=$id");
                oci_execute($query);
                $query2=oci_parse($conn, "UPDATE STUDENT.MATCH_CROMATIC SET CULOARE='$culoare_match', CULOARE_MATCH='$culoare' WHERE id=$id-1");
                oci_execute($query2);
            }
            $_SESSION['message'] = "Match updated!"; 
            header('location: match_culori.php');
        }
    }
    
    //delete match
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        if($id%2==1)
        {
            $query=oci_parse($conn, "DELETE FROM STUDENT.MATCH_CROMATIC WHERE id=$id");
            oci_execute($query);
            $query2=oci_parse($conn, "DELETE FROM STUDENT.MATCH_CROMATIC WHERE id=$id+1");
            oci_execute($query2);
        }
        else{
            $query=oci_parse($conn, "DELETE FROM STUDENT.MATCH_CROMATIC WHERE id=$id");
            oci_execute($query);
            $query2=oci_parse($conn, "DELETE FROM STUDENT.MATCH_CROMATIC WHERE id=$id-1");
            oci_execute($query2);
        }

        $_SESSION['message'] = "Match deleted!"; 
        header('location: match_culori.php');
    }
?>

