<?php 

    session_start();
    global $conn;
   // $conn = oci_connect('student', 'STUDENT', 'localhost:1521/xe');
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

    if(isset($_POST["ImportXml"])){
        $xml = simplexml_load_file($_FILES['file']['tmp_name']) or die("Error: Cannot create object");
        //$_SESSION['message'] = $_FILES['file']['tmp_name'];
        foreach ($xml->children() as $row) {
            $sexul = $row->sexul;
            $eveniment = $row->eveniment;
            $stil = $row->stil;
            $articol_path = $row->articol_path;
            $culoare = $row->culoare;
            $tip_piesa = $row->tip_piesa;
            $anotimp = $row->anotimp;
            

            $path=strval($articol_path);
            $path= str_replace('\\', '/',$path); // fac replace la \ cu /
            
            $nume = explode('/', $path);  //iau numele imaginii

            $cale = 'http://localhost/CloMaT_ProiectTW/images/' . end($nume);


           //$sql = "INSERT INTO tbl_tutorials(title,link,description,keywords) VALUES ('" . $title . "','" . $link . "','" . $description . "','" . $keywords . "')";
            $sql="INSERT INTO STUDENT.ARTICOLE (SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,TIP_PIESA,ANOTIMP) VALUES ('" . $sexul . "','" . $eveniment . "','" . $stil . "','" . $cale . "','" . $culoare . "','" . $tip_piesa . "','" . $anotimp . "')";
        $query = oci_parse($conn,$sql); 
        oci_execute($query);
        $data = file_get_contents($articol_path);
        //$new = "" + getName($n) + ".jpg";
        
        $new = 'C:/xampp/htdocs/CloMaT_ProiectTW/images/' . end($nume);
        file_put_contents($new, $data);

        $_SESSION['message'] = "Date xml incarcate cu succes!";
        header('location: import.php');
    }
}

if(isset($_POST["ImportJson"])){
    $fisier = file_get_contents($_FILES['file']['tmp_name']);
    $data = json_decode($fisier,true);
    $array_data = $data['articol'];
    foreach ($array_data as $row) {
        $sexul = $row['sexul'];
        $eveniment = $row['eveniment'];
        $stil = $row['stil'];
        $articol_path = $row['articol_path'];
        $culoare = $row['culoare'];
        $tip_piesa = $row['tip_piesa'];
        $anotimp = $row['anotimp'];
        

        $path=strval($articol_path);
        //$path= str_replace('\\', '/',$path); // fac replace la \ cu /
        
        $nume = explode('/', $path);  //iau numele imaginii

        $cale = 'http://localhost/CloMaT_ProiectTW/images/' . end($nume);


       //$sql = "INSERT INTO tbl_tutorials(title,link,description,keywords) VALUES ('" . $title . "','" . $link . "','" . $description . "','" . $keywords . "')";
        $sql="INSERT INTO STUDENT.ARTICOLE (SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,TIP_PIESA,ANOTIMP) VALUES ('" . $sexul . "','" . $eveniment . "','" . $stil . "','" . $cale . "','" . $culoare . "','" . $tip_piesa . "','" . $anotimp . "')";
    $query = oci_parse($conn,$sql); 
    oci_execute($query);
    $data = file_get_contents($articol_path);
    //$new = "" + getName($n) + ".jpg";
    
    $new = 'C:/xampp/htdocs/CloMaT_ProiectTW/images/' . end($nume);
    file_put_contents($new, $data);

    $_SESSION['message'] = "Date json incarcate cu succes!";
    header('location: import.php');
    }

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
        header('location: import.php');
    }
    
    //delete filre
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $query=oci_parse($conn, "DELETE FROM STUDENT.ARTICOLE WHERE id=$id");
        oci_execute($query);
        $_SESSION['message'] = "Object deleted!"; 
        header('location: import.php');
    }
?>

