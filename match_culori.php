<?php  include('php_code_culori.php');

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = oci_parse($conn, "SELECT * FROM STUDENT.MATCH_CROMATIC WHERE ID=$id");
        oci_execute($record);
        $n = oci_fetch_array($record);
		$culoare = $n['CULOARE'];
        $culoare_match = $n['CULOARE_MATCH'];
        $id=$n['ID'];

	}
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
                <li><a href="statistici.php">Statistici useri</a></li>
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

            <form method="post" action="php_code_culori.php" >
            <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="input-group">
                    <label>Culoare</label>
                    <input type="text" name="culoare" value="<?php echo $culoare; ?>">
                </div>
                <div class="input-group">
                    <label>Culoare match</label>
                    <input type="text" name="culoare_match" value="<?php echo $culoare_match; ?>">
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
                            <th>Culoare</th>
                            <th>Culoare match</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    
                    <?php while ($row = oci_fetch_array($stid, OCI_ASSOC)) { ?>
                        <tr>
                            <td><?php echo $row['CULOARE']; ?></td>
                            <td><?php echo $row['CULOARE_MATCH']; ?></td>
                            <td>
                                <a href="match_culori.php?edit=<?php echo $row['ID']; ?>" class="edit_btn" >Edit</a>
                            </td>
                            <td>
                                <a href="php_code_culori.php?del=<?php echo $row['ID']; ?>" class="del_btn">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
             </div>

    </div>

    </div>


    <script src="js/login_js/admin.js"></script>

</body>
</html>