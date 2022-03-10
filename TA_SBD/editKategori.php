<?php
// include database connection file
include_once("config.php");
// Check if form is submitted for data update, then redirect to
//homepage after update
if(isset($_POST['update']))
{
$id = $_POST['id'];
$nama_kategori=$_POST['kategori'];
// update data
$result = mysqli_query($mysqli, "UPDATE kategori SET
kategori_produk='$nama_kategori' WHERE id_kategori=$id");
// Redirect to homepage to display updated data in list
header("Location: main.php");
}
?>
<?php
// Display selected minuman based on id
// Getting id from url
$id = $_GET['id'];
// Fetch data based on id
$result = mysqli_query($mysqli, "SELECT * FROM kategori WHERE
id_kategori=$id");
while($kategori = mysqli_fetch_array($result))
{
$nama_kategori = $kategori['kategori_produk'];
}
?>
<html>
<head>
<title>Edit Makanan</title>
</head>
<body>
<a href="main.php">Home</a>
<br/><br/>
<h2>Edit Kategori</h2>

<form name="update_kategori" method="post"

action="editKategori.php">
<table border="0">
<tr>
<td width="118">Kategori Produk</td>
<td width="158"><input type="text" name="kategori" value=<?php echo

$nama_kategori;?>></td>
</tr>
<tr>

<td><input type="hidden" name="id" value=<?php echo

$_GET['id'];?>></td>

<td><input type="submit" name="update"

value="Update"></td>
</tr>
</table>
</form>
</body>
</html>
