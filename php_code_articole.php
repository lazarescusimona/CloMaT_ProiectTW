<?php 
    session_start();
    global $conn;
	$conn = oci_connect('student', 'student', 'localhost/XE');

	// initialize variables
	$sexul = "";
    $eveniment = "";
    $stil = "";
    $articol_path = "";
    $culoare = "";
    $tip_piesa = "";
    $anotimp = "";
   
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$sexul = $_POST['sexul'];
        $eveniment = $_POST['eveniment'];
        $stil = $_POST['stil'];
        $articol_path = $_POST['articol_path'];
        $culoare = $_POST['culoare'];
        $tip_piesa = $_POST['tip_piesa'];
        $anotimp = $_POST['anotimp'];
        $query = oci_parse($conn,"Insert into STUDENT.ARTICOLE (SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,TIP_PIESA,ANOTIMP) values ('$sexul', '$eveniment', '$stil', '$articol_path', '$culoare', '$tip_piesa', '$anotimp')"); 
        oci_execute($query);
		$_SESSION['message'] = "Object saved"; 
		header('location: articole.php');
    }

    $sql = 'SELECT * FROM STUDENT.ARTICOLE';
    $stid = oci_parse($conn, $sql);
    oci_execute($stid);

    //update filtre
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $sexul = $_POST['sexul'];
        $eveniment = $_POST['eveniment'];
        $stil = $_POST['stil'];
        $articol_path = $_POST['articol_path'];
        $culoare = $_POST['culoare'];
        $tip_piesa = $_POST['tip_piesa'];
        $anotimp = $_POST['anotimp'];
        $query=oci_parse($conn, "UPDATE STUDENT.ARTICOLE SET SEXUL='$sexul', EVENIMENT='$eveniment', STIL='$stil', ARTICOL_PATH='$articol_path', CULOARE='$culoare', TIP_PIESA='$tip_piesa', ANOTIMP='$anotimp' WHERE id=$id");
        oci_execute($query);
        $_SESSION['message'] = "Object updated!"; 
        header('location: articole.php');
    }
    
    //delete filre
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $query=oci_parse($conn, "DELETE FROM STUDENT.ARTICOLE WHERE id=$id");
        oci_execute($query);
        $_SESSION['message'] = "Object deleted!"; 
        header('location: articole.php');
    }
?>

