<?php 
    session_start();
    global $conn;
    $conn = oci_connect('student', 'STUDENT', 'localhost:1521/xe');
    //$conn = oci_connect('student', 'student', 'localhost/XE');

	// initialize variables
	$sexul = "";
    $eveniment = "";
    $stil = "";
    $articol_path = "";
    $culoare = "";
    $material = "";
    $tip_piesa = "";
    $anotimp = "";
   
	$id = 0;
	$update = false;

    //Edit section
    if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = oci_parse($conn, "SELECT * FROM STUDENT.ARTICOLE WHERE ID=$id");
        oci_execute($record);
        $n = oci_fetch_array($record);
		$sexul = $n['SEXUL'];
        $eveniment = $n['EVENIMENT'];
        $stil = $n['STIL'];
        $articol_path = $n['ARTICOL_PATH'];
        $culoare = $n['CULOARE'];
        $material = $n['MATERIAL'];
        $tip_piesa = $n['TIP_PIESA'];
        $anotimp = $n['ANOTIMP'];
        $id=$n['ID'];

	}

    //Save section
	if (isset($_POST['save'])) {
		$sexul = htmlspecialchars($_POST['sexul']);
        $eveniment = htmlspecialchars($_POST['eveniment']);
        $stil = htmlspecialchars($_POST['stil']);
        $articol_path = htmlspecialchars($_POST['articol_path']);
        $culoare = htmlspecialchars($_POST['culoare']);
        $material = htmlspecialchars($_POST['material']);
        $tip_piesa = htmlspecialchars($_POST['tip_piesa']);
        $anotimp = htmlspecialchars($_POST['anotimp']);
        if(empty($sexul) || empty($eveniment) || empty($stil) || empty($articol_path) || empty($culoare) || empty($material) || empty($tip_piesa) || empty($anotimp)){
            $_SESSION['message'] = "Toate campurile trebuie completate!"; 
            header('location: http://localhost/CloMaT_ProiectTW/articole.php');
            
        }
        else{

            move_uploaded_file($_FILES["file_img"]["tmp_name"], "http://localhost/CloMaT_ProiectTW/images/" . $_FILES["file_img"]["name"]);

            $query = oci_parse($conn,"Insert into STUDENT.ARTICOLE (SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values ('$sexul', '$eveniment', '$stil', '$articol_path', '$culoare', '$material', '$tip_piesa', '$anotimp')"); 
            oci_execute($query);
            $_SESSION['message'] = "Object saved!";
            header('location: http://localhost/CloMaT_ProiectTW/articole.php');
        }
    }

    $sql = 'SELECT * FROM STUDENT.ARTICOLE ORDER BY ID';
    $stid = oci_parse($conn, $sql);
    oci_execute($stid);

    //update filtre
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $sexul = htmlspecialchars($_POST['sexul']);
        $eveniment = htmlspecialchars($_POST['eveniment']);
        $stil = htmlspecialchars($_POST['stil']);
        $articol_path = htmlspecialchars($_POST['articol_path']);
        $culoare = htmlspecialchars($_POST['culoare']);
        $material = htmlspecialchars($_POST['material']);
        $tip_piesa = htmlspecialchars($_POST['tip_piesa']);
        $anotimp = htmlspecialchars($_POST['anotimp']);
        if(empty($sexul) || empty($eveniment) || empty($stil) || empty($articol_path) || empty($culoare) || empty($material) || empty($tip_piesa) || empty($anotimp)){
            $_SESSION['message'] = "Toate campurile trebuie completate!"; 
            header('location: http://localhost/CloMaT_ProiectTW/articole.php');
            
        }
        else{
            $query=oci_parse($conn, "UPDATE STUDENT.ARTICOLE SET SEXUL='$sexul', EVENIMENT='$eveniment', STIL='$stil', ARTICOL_PATH='$articol_path', CULOARE='$culoare', MATERIAL='$material', TIP_PIESA='$tip_piesa', ANOTIMP='$anotimp' WHERE id=$id");
            oci_execute($query);
            $_SESSION['message'] = "Object updated!"; 
            header('location: http://localhost/CloMaT_ProiectTW/articole.php');
        }
    }
    
    //delete filre
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $query=oci_parse($conn, "DELETE FROM STUDENT.ARTICOLE WHERE id=$id");
        oci_execute($query);
        $_SESSION['message'] = "Object deleted!"; 
        header('location: http://localhost/CloMaT_ProiectTW/articole.php');
    }
?>

