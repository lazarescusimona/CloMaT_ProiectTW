<?php 

    session_start();
    global $conn;
    //$conn = oci_connect('student', 'STUDENT', 'localhost:1521/xe');
    $conn = oci_connect('student', 'student', 'localhost/XE');

	// initialize variables
	$sexul = "";
    $eveniment = "";
    $stil = "";
    $articol_path = "";
    $culoare = "";
    $material="";
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

    if(isset($_POST["ImportXml"])){

        //Verific daca extensia este xml
        
        $filename = $_FILES['file']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if ($ext !== 'xml') {
            $_SESSION['message'] = "Incarcati un fisier XML!";
            header('location: import.php');
        }
        else{
                $xml = simplexml_load_file($_FILES['file']['tmp_name']) or die("Error: Cannot create object");
                //$_SESSION['message'] = $_FILES['file']['tmp_name'];
                foreach ($xml->children() as $row) {
                    $sexul = $row->sexul;
                    $eveniment = $row->eveniment;
                    $stil = $row->stil;
                    $articol_path = $row->articol_path;
                    $culoare = $row->culoare;
                    $material = $row->material;
                    $tip_piesa = $row->tip_piesa;
                    $anotimp = $row->anotimp;
                    

                    $path=strval($articol_path);
                    $path= str_replace('\\', '/',$path); // fac replace la \ cu /
                    
                    $nume = explode('/', $path);  //iau numele imaginii

                    $cale = 'http://localhost/CloMaT_ProiectTW/images/' . end($nume);


                    $sql="INSERT INTO STUDENT.ARTICOLE (SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) VALUES ('" . $sexul . "','" . $eveniment . "','" . $stil . "','" . $cale . "','" . $culoare . "','" .$material . "', '" . $tip_piesa . "','" . $anotimp . "')";
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
}

    if(isset($_POST["ImportJson"])){

        $filename = $_FILES['file']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if ($ext !== 'json') {
            $_SESSION['message'] = "Incarcati un fisier JSON!";
            header('location: import.php');
        }
        else{
            $fisier = file_get_contents($_FILES['file']['tmp_name']);
            $data = json_decode($fisier,true);
            $array_data = $data['articol'];
            foreach ($array_data as $row) {
                $sexul = $row['sexul'];
                $eveniment = $row['eveniment'];
                $stil = $row['stil'];
                $articol_path = $row['articol_path'];
                $culoare = $row['culoare'];
                $material = $row['material'];
                $tip_piesa = $row['tip_piesa'];
                $anotimp = $row['anotimp'];
                

                $path=strval($articol_path);
                //$path= str_replace('\\', '/',$path); // fac replace la \ cu /
                
                $nume = explode('/', $path);  //iau numele imaginii

                $cale = 'http://localhost/CloMaT_ProiectTW/images/' . end($nume);


            //$sql = "INSERT INTO tbl_tutorials(title,link,description,keywords) VALUES ('" . $title . "','" . $link . "','" . $description . "','" . $keywords . "')";
                $sql="INSERT INTO STUDENT.ARTICOLE (SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) VALUES ('" . $sexul . "','" . $eveniment . "','" . $stil . "','" . $cale . "','" . $culoare . "','" . $material . "', '" . $tip_piesa . "','" . $anotimp . "')";
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
        $query=oci_parse($conn, "UPDATE STUDENT.ARTICOLE SET SEXUL='$sexul', EVENIMENT='$eveniment', STIL='$stil', ARTICOL_PATH='$articol_path', CULOARE='$culoare', MATERIAL='$material', TIP_PIESA='$tip_piesa', ANOTIMP='$anotimp' WHERE id=$id");
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

