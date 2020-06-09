<?php       
   global $conn;
   $conn = oci_connect('Student', 'STUDENT', 'localhost:1521/xe'); 
   if(isset($_POST['save'])){
      $userRuda = $_POST['name'];
      if((!empty($userRuda)))
      {
        $userul = $_SESSION['username'];
        $query = oci_parse($conn, "SELECT * FROM utilizatori WHERE username = '$userRuda'");
        oci_execute($query);
        if( $rows = oci_fetch_array($query) ){
            $query2 = oci_parse($conn, "SELECT * FROM rude WHERE userUtilizator = '$userul' and ruda='$userRuda'");
        oci_execute($query2);
        if( !oci_fetch_array($query2) ){
            $userul = $_SESSION['username'];
            $insert = oci_parse($conn, 'insert into rude (userUtilizator, ruda) values (:userUsername, :rudaUsername)');
            oci_bind_by_name($insert, ':userUsername', $userul);
            oci_bind_by_name($insert, ':rudaUsername', $userRuda);
            $r = oci_execute($insert); //executa inserarea + commit
            $insert = oci_parse($conn, 'insert into rude (userUtilizator, ruda) values (:userUsername, :rudaUsername)');
            oci_bind_by_name($insert, ':userUsername', $userRuda);
            oci_bind_by_name($insert, ':rudaUsername', $userul);
            $r = oci_execute($insert); //executa inserarea + commit
            $_SESSION['areRuda'] = 1;
        }
   }
   }
}