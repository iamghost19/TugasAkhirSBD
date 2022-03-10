<?php
include_once("config.php");
?>
<h2>Pencarian</h2>
<form action="searchItem.php" method="post" name="form1">
<table width="28%" border="0">
<tr>
<td>Nama Produk</td>
<td><input type="text" name="search"></td>
</tr>
<tr>
<td></td>

<td><input type="submit" name="Submit"

value="Submit"></td>
</tr>
</table>
</form>

<?php
// Check If form submitted, insert form data into users table.
if(isset($_POST['Submit'])) {
$kataKunci = $_POST['search'];
// include database connection file
include_once("config.php");
// Insert user data into table


?>


<p>List Produk</p>
<table border="1">
  <tr><th>no</th><th>nama produk</th><th>kategori produk</th><th>nama suplier</th><th>stok</th><th>harga</th></tr>
    <?php
	$produk = mysqli_query($mysqli, "SELECT a.id_produk, A.nama_produk, a.stok_produk, a.harga_produk, b.kategori_produk, c.nama_suplier 
	from produk A 
	INNER JOIN kategori B 
	ON A.id_kategori = B.id_kategori 
	INNER JOIN suplier C
	ON A.id_suplier = C.id_suplier 
    WHERE a.is_delete=0 and a.nama_produk like '%$kataKunci%' ORDER BY id_produk DESC");
    $no=1;
     while($row =mysqli_fetch_array($produk)){
        echo "<tr>
            <td>$no</td>
            <td>".$row['nama_produk']."</td>
            <td>".$row['kategori_produk']."</td>
            <td>".$row['nama_suplier']."</td>
			<td>".$row['stok_produk']."</td>
			<td>".$row['harga_produk']."</td>
              </tr>";
        $no++;
    }
	
    ?>
</table>
<p>
  <?php
	
}
?>
  </p>
<p><a href="main.php">Go to Home</a></p>
