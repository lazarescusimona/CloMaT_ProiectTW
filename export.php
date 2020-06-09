<?php  include('php_code_export.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Login</title>

    <link rel="stylesheet" href="login_css/admin.css" type="text/css" >
    
</head>
<body>
    <div id="container">
        <nav id="leftnav">
            <div id="logo">
                Admin <span>P a n e l </span>
            </div>

            <ul id="menu">

            <li><a href="admin.php">Home</a></li>
                <li><a href="">Statistici</a></li>
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



        <div id="user">
                <?php if (isset($_SESSION['message'])): ?>
                <div class="msg">
                    <?php 
                        echo $_SESSION['message']; 
                        unset($_SESSION['message']);
                    ?>
                </div>
                <?php endif ?>

            <form method="post" action="php_code_export.php" name="upload_excel" enctype="multipart/form-data">
                <div class="input-group">
                    <input type="submit" name="ExportFiltre" class="btn btn-success" value="Export filtre in format csv"/>
                </div>
                <div class="input-group">
                    <input type="submit" name="ExportUtilizatori" class="btn btn-success" value="Export utilizatori in format csv"/>
                </div>
                <div class="input-group">
                    <input type="submit" name="ExportPreferinte" class="btn btn-success" value="Export preferinte in format csv"/>
                </div>
                <div class="input-group">
                    <input type="submit" name="ExportArticole" class="btn btn-success" value="Export articole in format csv"/>
                </div>
                
            </form>


    </div>
    <script src="js/login_js/admin.js"></script>

</body>
</html>