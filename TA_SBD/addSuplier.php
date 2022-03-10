<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-
scale=1.0">

<title>Add suplier</title>
</head>
<body>
<a href="main.php">Go to Home</a>
<br/><br/>
<h2>Tambah Suplier</h2>
<form action="addSuplier.php" method="post" name="form1">
<table width="28%" border="0">
<tr>
<td>Suplier produk</td>
<td><input type="text" name="nama_suplier"></td>
</tr>
<tr>
<td></td>

<td><input type="submit" name="Submit"

value="Add"></td>
</tr>
</table>
</form>
<?php
// Check If form submitted, insert form data into users table.
if(isset($_POST['Submit'])) {
$suplier = $_POST['nama_suplier'];
// include database connection file
include_once("config.php");
// Insert user data into table

$result = mysqli_query($mysqli, "INSERT INTO

suplier(nama_suplier) VALUES('$suplier')");

// Show message when user added

echo "Berhasil menambahkan suplier <a

href='main.php'>dashboard</a>";
}
?>
</body>
</html>
