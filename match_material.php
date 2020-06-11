<?php  include($_SERVER['DOCUMENT_ROOT']."/CloMaT_ProiectTW/Not_here/php_code_materiale.php");

?>
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

        <div id="user">
                <?php if (isset($_SESSION['message'])): ?>
                <div class="msg">
                    <?php 
                        echo $_SESSION['message']; 
                        unset($_SESSION['message']);
                    ?>
                </div>
                <?php endif ?>

            <form method="post" action="http://localhost/CloMaT_ProiectTW/Not_here/php_code_materiale.php" >
            <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="input-group">
                    <label>Material</label>
                    <input type="text" name="material" value="<?php echo $material; ?>">
                </div>
                <div class="input-group">
                    <label>Material match</label>
                    <input type="text" name="material_match" value="<?php echo $material_match; ?>">
                </div>
                
                <div class="input-group">
                    <?php if ($update == true): ?>
                        <button class="btn" type="submit" name="update" style="background: #556B2F;" >Update</button>
                    <?php else: ?>
                        <button class="btn" type="submit" name="save" >Save</button>
                    <?php endif ?>		
                </div>
                

            </form>

            <div class="tabel">
                <table>
                    <thead>
                        <tr>
                            <th>Material</th>
                            <th>Material match</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    
                    <?php while ($row = oci_fetch_array($stid, OCI_ASSOC)) { ?>
                        <tr>
                            <td><?php echo $row['MATERIAL']; ?></td>
                            <td><?php echo $row['MATERIAL_MATCH']; ?></td>
                            <td>
                                <a href="http://localhost/CloMaT_ProiectTW/match_material.php?edit=<?php echo $row['ID']; ?>" class="edit_btn" >Edit</a>
                            </td>
                            <td>
                                <a href="http://localhost/CloMaT_ProiectTW/Not_here/php_code_materiale.php?del=<?php echo $row['ID']; ?>" class="del_btn">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
             </div>

    </div>

    </div>


    <script src="http://localhost/CloMaT_ProiectTW/js/login_js/admin.js"></script>

</body>
</html>