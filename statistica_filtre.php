<?php

session_start();
global $conn;
$conn = oci_connect('student', 'student', 'localhost/XE');
 //$conn = oci_connect('student', 'STUDENT', 'localhost:1521/xe');


$query = oci_parse($conn,"SELECT ID, FILTRU,TRUNC(NR_CAUTARI/2) FROM STUDENT.STATISTICA_FILTRE ORDER BY id");

oci_execute($query);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Login</title>
    <link rel="stylesheet" href="login_css/admin.css" type="text/css" >
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
            ['Filtru', 'Numar cautari'],
          
          <?php 

            while($row = oci_fetch_array($query)){
                echo "['"." [".$row[1]."]', ".$row[2]."],";  
                }

          ?>


        ]);

        var options = {
          width: 800,
          legend: { position: 'none' },
          chart: {
            title: 'Statistica filtre',
            subtitle: 'CloMaT' },
          axes: {
            x: {
              0: { side: 'top', label: ''} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>
</head>
<body>
    <div id="container">
        <nav id="leftnav">
            <div id="logo">
                Admin <span>P a n e l </span>
            </div>

            <ul id="menu">

            <li><a href="admin.php">Home</a></li>
                <li><a href="statistici.php">Statistici useri</a></li>
                <li><a href="statistica_filtre.php">Statistici filtre</a></li>
                <li><a href="users.php">Users</a></li>
                <li><a href="articole.php">Articole</a></li>
                <li><a href="admin_filtre.php">Filtre</a></li>
                <li><a href="export.php">Export</a></li>
                <li><a href="import.php">Import</a></li>
                <li><a href="match_culori.php">Match culori</a></li>
                <li><a href="match_material.php">Match material</a></li>

            </ul>

            <div id="minimize">
                &lt;
            </div>

            
        </nav>

        <header id="topnav">
            <div id="links">
                <a href="deconectare.php">Logout</a> <!-- pastreaza link-ul asa pentru ca deconectarea sa se realizeze-->
            </div>
        </header>


        <main id="main">
            <div id='maximize'>
                &gt;
            </div>

        </main>

        <form method="post">
        <div id="user">
        <div id="top_x_div" style="width: 700px; height: 500px;"></div>
        </div>
        </form>

    </div>


    
    <script src="js/login_js/admin.js"></script>

</body>
</html>