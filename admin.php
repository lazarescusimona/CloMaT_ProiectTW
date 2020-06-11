<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Login</title>

    <link rel="stylesheet" href="http://localhost/CloMaT_ProiectTW/login_css/admin.css" type="text/css" >
    
</head>
<body>
    <div id="container">
        <nav id="leftnav">
            <div id="logo">
                Admin <span>P a n e l </span>
            </div>

            <ul id="menu">

                <li><a href="http://localhost/CloMaT_ProiectTW/admin.php">Home</a></li>
                <li><a href="http://localhost/CloMaT_ProiectTW/statistici.php">Statistici useri</a></li>
                <li><a href="http://localhost/CloMaT_ProiectTW/statistica_filtre.php">Statistici filtre</a></li>
                <li><a href="http://localhost/CloMaT_ProiectTW/users.php">Users</a></li>
                <li><a href="http://localhost/CloMaT_ProiectTW/articole.php">Articole</a></li>
                <li><a href="http://localhost/CloMaT_ProiectTW/admin_filtre.php">Filtre</a></li>
                <li><a href="http://localhost/CloMaT_ProiectTW/export.php">Export</a></li>
                <li><a href="http://localhost/CloMaT_ProiectTW/import.php">Import</a></li>
                <li><a href="http://localhost/CloMaT_ProiectTW/match_culori.php">Match culori</a></li>
                <li><a href="http://localhost/CloMaT_ProiectTW/match_material.php">Match material</a></li>

            </ul>

            <div id="minimize">
                &lt;
            </div>

            
        </nav>

        <header id="topnav">
            <div id="links">
                <a href="http://localhost/CloMaT_ProiectTW/Not_here/deconectare.php">Logout</a> <!-- pastreaza link-ul asa pentru ca deconectarea sa se realizeze-->
            </div>
        </header>


        <main id="main">
            <div id='maximize'>
                &gt;
            </div>

        </main>
        
        <form method="post"  style="background-image: url('http://localhost/CloMaT_ProiectTW/images/original.gif');height: 100%; width:100% background-position: center; background-repeat: no-repeat; background-size: cover;">
        <div id="user">
            
        </div>
        </form>

    </div>

    <div class="bg"></div>
    <script src="http://localhost/CloMaT_ProiectTW/js/login_js/admin.js"></script>

</body>
</html>