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


    </div>
    <script src="js/login_js/admin.js"></script>

</body>
</html>