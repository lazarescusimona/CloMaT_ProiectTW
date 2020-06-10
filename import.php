<?php  include('php_code_import.php');

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
        $tip_piesa = $n['TIP_PIESA'];
        $anotimp = $n['ANOTIMP'];
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

        <div id="user">
                <?php if (isset($_SESSION['message'])): ?>
                <div class="msg">
                    <?php 
                        echo $_SESSION['message']; 
                        unset($_SESSION['message']);
                    ?>
                </div>
                <?php endif ?>

            <form method="post" action="php_code_import.php" enctype="multipart/form-data" >
            <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="input-group">
                    <label>Selecteaza fisierul XML</label>
                    <input type="file" name="file" id="file" />
                </div>
                <div class="input-group">
                    <input type="submit" name="ImportXml" class="btn btn-success" value="Import date in format xml"/>
                </div>
                <div class="input-group">
                    <input type="submit" name="ImportJson" class="btn btn-success" value="Import date in format json"/>
                </div>
                <div class="input-group">
                    <label>Sexul</label>
                    <input type="text" name="sexul" value="<?php echo $sexul; ?>">
                </div>
                <div class="input-group">
                    <label>Eveniment</label>
                    <input type="text" name="eveniment" value="<?php echo $eveniment; ?>">
                </div>
                <div class="input-group">
                    <label>Stil</label>
                    <input type="text" name="stil" value="<?php echo $stil; ?>">
                </div>
                <div class="input-group">
                    <label>Articol Path</label>
                </div>
                <input type="file" name="file_img" id="file_img" style="margin: 1% auto;" onchange="document.getElementById('articol_path').value = 'http://localhost/CloMaT_ProiectTW/images/' + this.value.split('\\').pop().split('/').pop()">
                <div class="input-group">
                    <input type="text" name="articol_path" id="articol_path" value="<?php echo $articol_path; ?>">
                </div>
                <div class="input-group">
                    <label>Culoare</label>
                    <input type="text" name="culoare" value="<?php echo $culoare; ?>">
                </div>
                <div class="input-group">
                    <label>Tip piesa</label>
                    <input type="text" name="tip_piesa" value="<?php echo $tip_piesa; ?>">
                </div>
                <div class="input-group">
                    <label>Anotimp</label>
                    <input type="text" name="anotimp" value="<?php echo $anotimp; ?>">
                </div>
                
                <div class="input-group">
                    <?php if ($update == true): ?>
                        <button class="btn" type="submit" name="update" style="background: #556B2F;" >Update</button>
                    <?php endif ?>		
                </div>
                

            </form>

            <div class="tabel">
                <table>
                    <thead>
                        <tr>
                            <th>Sexul</th>
                            <th>Eveniment</th>
                            <th>Stil</th>
                            <th>Articol path</th>
                            <th>Culoare</th>
                            <th>Tip piesa</th>
                            <th>Anotimp</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    
                    <?php while ($row = oci_fetch_array($stid, OCI_ASSOC)) { ?>
                        <tr>
                            <td><?php echo $row['SEXUL']; ?></td>
                            <td><?php echo $row['EVENIMENT']; ?></td>
                            <td><?php echo $row['STIL']; ?></td>
                            <td><?php echo $row['ARTICOL_PATH']; ?></td>
                            <td><?php echo $row['CULOARE']; ?></td>
                            <td><?php echo $row['TIP_PIESA']; ?></td>
                            <td><?php echo $row['ANOTIMP']; ?></td>
                            <td>
                                <a href="import.php?edit=<?php echo $row['ID']; ?>" class="edit_btn" >Edit</a>
                            </td>
                            <td>
                                <a href="php_code_import.php?del=<?php echo $row['ID']; ?>" class="del_btn">Delete</a>
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