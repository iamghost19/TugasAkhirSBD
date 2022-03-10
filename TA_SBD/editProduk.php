<?php
// include database connection file
include_once("config.php");
// Check if form is submitted for data update, then redirect to
//homepage after update
if(isset($_POST['update']))
{
$id = $_POST['id'];
$nama_produk = $_POST['nama_produk'];
$harga_produk = $_POST['harga'];
$stok_produk = $_POST['stok'];
$id_kategori=$_POST['kategori'];
$id_suplier = $_POST['suplier'];
// update data
$query = "UPDATE produk SET
nama_produk='$nama_produk', harga_produk='$harga_produk',stok_produk='$stok_produk',id_kategori ='$id_kategori',id_suplier='$id_suplier'  WHERE id_produk='$id'";
$result = mysqli_query($mysqli, $query);
	
// Redirect to homepage to display updated data in list
header("Location: main.php");
}
?>
<?php
// Display selected minuman based on id
// Getting id from url
if(!empty($_GET['id']))
$id = $_GET['id'];
// Fetch data based on id
$result = mysqli_query($mysqli, "SELECT * FROM produk WHERE
id_produk=$id");
while($produk = mysqli_fetch_array($result))
{
$nama_produk = $produk['nama_produk'];
$harga_produk = $produk ['harga_produk'];
$stok_produk = $produk['stok_produk'];
$nama_kategori = $produk['id_kategori'];
$nama_suplier= $produk['id_suplier'];
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

action="editProduk.php">
<table border="0">
<tr>
	
<td width="118">Nama Produk</td>
<td width="158"><input type="text" name="nama_produk" value=<?php echo

$nama_produk;?>></td>

</tr>
	
<td>Harga Produk</td>
<td><input type="text" name="harga" value=<?php echo

$harga_produk;?>></td>
</tr>
	
<td>Stok Produk</td>
<td><input type="text" name="stok" value=<?php echo

$stok_produk;?>></td>
</tr>

<td>Kategori Produk</td>
<td><select type="text" name="kategori" value=><?php echo

$nama_kategori;
$mysql = mysqli_query($mysqli, "SELECT * FROM kategori order by id_kategori");
	$counter=0;
		echo "<option value = ''></option>";
		while ($data = mysqli_fetch_array($mysql)){
			$id_kategori=$data['id_kategori'];
			$nama=$data['kategori_produk'];
			
			echo "<option value ='$id_kategori'>$nama</option>";
		}
	
	?>
	</select>
	</td>
</tr>

<td>Suplier Produk</td>
<td>
	<select type="text" name="suplier" value=>
	<?php echo

$nama_suplier;
	$mysql = mysqli_query($mysqli, "SELECT * FROM suplier order by id_suplier");
	$counter=0;
		echo "<option value = ''></option>";
		while ($data = mysqli_fetch_array($mysql)){
			$id_suplier=$data['id_suplier'];
			$nama=$data['nama_suplier'];
			
			echo "<option value ='$id_suplier'>$nama</option>";
		}
		?>
	</select>
	</td>
</tr>


	<tr>

<td><input type="hidden" name="id" value=<?php echo $id;

?>></td>

<td><input type="submit" name="update"

value="Update"></td>
</tr>
</table>
</form>
</body>
</html>
