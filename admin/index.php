<?php  include($_SERVER['DOCUMENT_ROOT']."/CloMaT_ProiectTW/Not_here/php_code.php");

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = oci_parse($conn, "SELECT * FROM STUDENT.UTILIZATORI WHERE id=$id");
        oci_execute($record);
        $n = oci_fetch_array($record);
		$username = $n['USERNAME'];
        $parola = $n['PAROLA'];
        $email = $n['EMAIL'];
        $data_nasterii = $n['DATA_NASTERII'];
        $sex = $n['SEX'];
        $id=$n['ID'];

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard Clomat - Users</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

	<form method="post" action="http://localhost/CloMaT_ProiectTW/Not_here/php_code.php" >
    <input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </div>
		<div class="input-group">
			<label>Parola</label>
            <input type="text" name="parola" value="<?php echo $parola; ?>">
		</div>
        <div class="input-group">
			<label>Email</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
        </div>
		<div class="input-group">
			<label>Data nastere</label>
            <input type="text" name="data_nasterii" value="<?php echo $data_nasterii; ?>">
		</div>
        <div class="input-group">
			<label>Sex</label>
            <input type="text" name="sex" value="<?php echo $sex; ?>">
		</div>
		<div class="input-group">
            <?php if ($update == true): ?>
                <button class="btn" type="submit" name="update" style="background: #556B2F;" >Update</button>
            <?php else: ?>
                <button class="btn" type="submit" name="save" >Save</button>
            <?php endif ?>		
        </div>
        

    </form>

<table>
	<thead>
		<tr>
			<th>Username</th>
            <th>Parola</th>
			<th>Email</th>
            <th>Data nastere</th>
			<th>Sex</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = oci_fetch_array($stid, OCI_ASSOC)) { ?>
		<tr>
			<td><?php echo $row['USERNAME']; ?></td>
            <td><?php echo $row['PAROLA']; ?></td>
			<td><?php echo $row['EMAIL']; ?></td>
            <td><?php echo $row['DATA_NASTERII']; ?></td>
			<td><?php echo $row['SEX']; ?></td>
			<td>
				<a href="http://localhost/CloMaT_ProiectTW/index.php?edit=<?php echo $row['ID']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="http://localhost/CloMaT_ProiectTW/Not_here/php_code.php?del=<?php echo $row['ID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>


</body>
</html>