<?php 
    session_start();
    global $conn;
    //$conn = oci_connect('student', 'student', 'localhost/XE');
    $conn = oci_connect('student', 'STUDENT', 'localhost:1521/xe');


	// initialize variables
	$username = "";
    $parola = "";
    $email = "";
    $data_nasterii = "";
    $sex = "";
    $tip_utilizator = "";
    
	$id = 0;
	$update = false;

    //Edit section
    if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = oci_parse($conn, "SELECT * FROM STUDENT.UTILIZATORI WHERE id=$id");
        oci_execute($record);
        $n = oci_fetch_array($record);
		$username = $n['USERNAME'];
        $parola = "";
        $email = $n['EMAIL'];
        $data_nasterii = $n['DATA_NASTERII'];
        $sex = $n['SEX'];
        $tip_utilizator = $n['TIP_UTILIZATOR'];
        $id=$n['ID'];

	}

    //salvare useri
	if (isset($_POST['save'])) {
		$username = htmlspecialchars($_POST['username']);
        $parola = md5(htmlspecialchars($_POST['parola']));
        $email = htmlspecialchars($_POST['email']);
        $data_nasterii = htmlspecialchars($_POST['data_nasterii']);
        $sex = htmlspecialchars($_POST['sex']);
        $tip_utilizator = htmlspecialchars($_POST['tip_utilizator']);
        if(empty($username) || empty($parola) || empty($email) || empty($data_nasterii) || empty($sex) || empty($tip_utilizator)){
            $_SESSION['message'] = "Toate campurile trebuie completate!"; 
            header('location: http://localhost/CloMaT_ProiectTW/users.php');
            
        }
        else{
            $query = oci_parse($conn,'INSERT INTO STUDENT.UTILIZATORI (username, parola, email, data_nasterii, sex,tip_utilizator) VALUES (:username, :parola, :email, TO_DATE(:data_nasterii,:format), :sex, :tip_utilizator)'); 
            oci_bind_by_name($query, ':tip_utilizator', $tip_utilizator);
            oci_bind_by_name($query, ':username', $username);
            oci_bind_by_name($query, ':parola', $parola);
            oci_bind_by_name($query, ':email', $email);
            oci_bind_by_name($query, ':data_nasterii', $data_nasterii);
            oci_bind_by_name($query, ':sex', $sex);
            $format = 'yyyy/mm/dd';
            oci_bind_by_name($query, ':format', $format);
            oci_execute($query);
            $_SESSION['message'] = "User saved"; 
            header('location: http://localhost/CloMaT_ProiectTW/users.php');
        }
    }

    $sql = 'SELECT * FROM STUDENT.UTILIZATORI';
    $stid = oci_parse($conn, $sql);
    oci_execute($stid);

    //update users
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $username = htmlspecialchars($_POST['username']);
        $parola = md5(htmlspecialchars($_POST['parola']));
        $email = htmlspecialchars($_POST['email']);
        $data_nasterii = htmlspecialchars($_POST['data_nasterii']);
        $sex = htmlspecialchars($_POST['sex']);
        $tip_utilizator = htmlspecialchars($_POST['tip_utilizator']);
        if(empty($username) || empty($parola) || empty($email) || empty($data_nasterii) || empty($sex) || empty($tip_utilizator)){
            $_SESSION['message'] = "Toate campurile trebuie completate!"; 
            header('location: http://localhost/CloMaT_ProiectTW/users.php');
            
        }
        else{
            $query=oci_parse($conn, "UPDATE STUDENT.UTILIZATORI SET username='$username', parola='$parola', email='$email', data_nasterii='$data_nasterii', sex='$sex', tip_utilizator='$tip_utilizator' WHERE id=$id");
            oci_execute($query);
            $_SESSION['message'] = "User updated!"; 
            header('location: http://localhost/CloMaT_ProiectTW/users.php');
        }
    }
    
    //delete users
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $query=oci_parse($conn, "DELETE FROM STUDENT.UTILIZATORI WHERE id=$id");
        oci_execute($query);
        $_SESSION['message'] = "User deleted!"; 
        header('location: http://localhost/CloMaT_ProiectTW/users.php');
    }
?>


 <!-- 

session_start();
        global $conn;
        //$conn = oci_connect('clomat', 'clomat', 'localhost/XE', 'Clomat');
        $conn = oci_connect('student', 'student', 'localhost/XE'); //Asta e pentru test
        if(isset($_POST['submit'])){
            $user = $_POST['username'];
            $pass = $_POST['password'];
            //$s = oci_parse($conn, "select username,parola from utilizatori where username='$user' and parola='$pass'");       
            $query = oci_parse($conn, "SELECT * FROM utilizatori WHERE username = '$user' AND parola = '$pass'");
            oci_execute($query);
            if( $rows = oci_fetch_array($query) ){
              //... set session variables, login, etc...
              $_SESSION['username']=$user;
              $_SESSION['password']=$pass;
              //$_SESSION['time_start_login'] = time();
              header("location: filtre.html");
            }
            else{
            echo "wrong password or username";
            session_destroy();
            }
            /*oci_execute($s);
            $row = oci_fetch($s);
            if($row>0){
                    $_SESSION['username']=$user;
                    //$_SESSION['time_start_login'] = time();
                    header("location: filtre.html");
            }else{
                echo "wrong password or username";
                session_destroy();
            }*/
        }


 -->