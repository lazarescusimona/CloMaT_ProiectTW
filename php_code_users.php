<?php 
    session_start();
    global $conn;
    $conn = oci_connect('student', 'STUDENT', 'localhost:1521/xe');
    //$conn = oci_connect('student', 'student', 'localhost/XE');

	// initialize variables
	$username = "";
    $parola = "";
    $email = "";
    $data_nasterii = "";
    $sex = "";
    
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$username = $_POST['username'];
        $parola = md5($_POST['parola']);
        $email = $_POST['email'];
        $data_nasterii = $_POST['data_nasterii'];
        $sex = $_POST['sex'];
        $query = oci_parse($conn,"INSERT INTO STUDENT.UTILIZATORI (username, parola, email, data_nasterii, sex) VALUES ('$username', '$parola','$email', to_date('$data_nasterii','yyyy/mm/dd'),'$sex')"); 
        oci_execute($query);
		$_SESSION['message'] = "User saved"; 
		header('location: users.php');
    }

    $sql = 'SELECT * FROM STUDENT.UTILIZATORI';
    $stid = oci_parse($conn, $sql);
    oci_execute($stid);

    //update users
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $parola = md5($_POST['parola']);
        $email = $_POST['email'];
        $data_nasterii = $_POST['data_nasterii'];
        $sex = $_POST['sex'];
    
        $query=oci_parse($conn, "UPDATE STUDENT.UTILIZATORI SET username='$username', parola='$parola', email='$email', data_nasterii='$data_nasterii', sex='$sex' WHERE id=$id");
        oci_execute($query);
        $_SESSION['message'] = "User updated!"; 
        header('location: users.php');
    }
    
    //delete users
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $query=oci_parse($conn, "DELETE FROM STUDENT.UTILIZATORI WHERE id=$id");
        oci_execute($query);
        $_SESSION['message'] = "User deleted!"; 
        header('location: users.php');
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