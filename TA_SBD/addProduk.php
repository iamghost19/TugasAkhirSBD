<?php
include_once("config.php");

?>

<title>Add Produk</title>
</head>
<body>
<a href="main.php">Go to Home</a>
<br/><br/>
<h2>Tambah Produk</h2>
<form action="addProduk.php" method="post" name="form1">
<table width="25%" border="0">
<tr>
<td>Nama Produk</td>
<td><input type="text" name="nama_produk"></td>
</tr>
<tr>
<td>Harga Produk</td>
<td><input type="text" name="harga_produk"></td>
</tr>
<tr>
<td>Kategori Produk</td>
<td><select name="kategori" id="kategori">
	
	<?php
	$mysql = mysqli_query($mysqli, "SELECT * FROM kategori order by id_kategori");
	$counter=0;
		echo "<option value = ''></option>";
		while ($data = mysqli_fetch_array($mysql)){
			$id_kategori=$data['id_kategori'];
			$nama=$data['kategori_produk'];
			
			echo "<option value ='$id_kategori'>$nama</option>";
		}
	?>
	</select></td>
</tr>
<tr>
<td>Suplier Produk</td>
<td><select name="suplier" id="suplier">
	<?php
	$mysql = mysqli_query($mysqli, "SELECT * FROM suplier order by id_suplier");
		if ($mysql)
	$counter=0;
		echo "<option value = ''></option>";
		while ($data = mysqli_fetch_array($mysql)){
			$id_suplier=$data['id_suplier'];
			$nama=$data['nama_suplier'];
			
			echo "<option value ='$id_suplier'>$nama</option>";
		}
	?>
	</select></td>
</tr>
<tr>
<td>Stok Produk</td>
<td><input type="text" name="stok_produk"></td>
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
$nama = $_POST['nama_produk'];
$harga = $_POST['harga_produk'];
$kategori = $_POST['kategori'];
$suplier = $_POST['suplier'];
$stok = $_POST['stok_produk'];
// include database connection file


$result = mysqli_query($mysqli, "INSERT INTO

produk(nama_produk,harga_produk,stok_produk,id_kategori,id_suplier) VALUES('$nama','$harga','$stok','$kategori','$suplier')");

// Show message when user added

echo "Berhasil menambahkan produk <a

href='main.php'>dashboard</a>";
}
?>
</body>
</html>
