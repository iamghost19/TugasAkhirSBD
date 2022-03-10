<?php
include_once("config.php");
?>

<h2>Recycle Bin</h2>
<a href="main.php">Home</a>
<p>List Suplier</p>
<table border="1">
    <tr><th>no</th><th>nama suplier<th>aksi</th></tr>
    <?php
	$suplier = mysqli_query($mysqli, "SELECT * FROM suplier WHERE
is_delete=1 ORDER BY id_suplier DESC");
    $no=1;
     while($row =mysqli_fetch_array($suplier)){
        echo "<tr>
            <td>$no</td>
            <td>".$row['nama_suplier']."</td>
			<td><a href=restoreSuplier.php?id=".$row['id_suplier'].">restore </a> &nbsp; &nbsp; <a href=deleteSuplierForever.php?id=".$row['id_suplier']."> delete </a> </td>
              </tr>";
        $no++;
    }
    ?>
</table>

<p>List kategori</p>
<table border="1">
    <tr><th>no</th><th>nama kategori</th><th>aksi</th></tr>
    <?php
	$kategori = mysqli_query($mysqli, "SELECT * FROM kategori WHERE
is_delete=1 ORDER BY id_kategori DESC");
    $no=1;
     while($row =mysqli_fetch_array($kategori)){
        echo "<tr>
            <td>$no</td>
            <td>".$row['kategori_produk']."</td>
			<td><a href=restoreKategori.php?id=".$row['id_kategori'].">restore </a> &nbsp; &nbsp; <a href=deleteKategoriForever.php?id=".$row['id_kategori']."> delete </a> </td>
              </tr>";
        $no++;
    }
    ?>
</table>

<p>List Produk</p>
<table border="1">
  <tr><th>no</th><th>nama produk</th><th>kategori produk</th><th>nama suplier</th><th>stok</th><th>harga</th><th>aksi</th></tr>
    <?php
	$produk = mysqli_query($mysqli, "SELECT a.id_produk, A.nama_produk, a.stok_produk, a.harga_produk, b.kategori_produk, c.nama_suplier 
	from produk A 
	INNER JOIN kategori B 
	ON A.id_kategori = B.id_kategori 
	INNER JOIN suplier C
	ON A.id_suplier = C.id_suplier 
    WHERE a.is_delete=1 ORDER BY id_produk DESC");
    $no=1;
     while($row =mysqli_fetch_array($produk)){
        echo "<tr>
            <td>$no</td>
            <td>".$row['nama_produk']."</td>
            <td>".$row['kategori_produk']."</td>
            <td>".$row['nama_suplier']."</td>
			<td>".$row['stok_produk']."</td>
			<td>".$row['harga_produk']."</td>
			<td><a href=restoreProduk.php?id=".$row['id_produk']."> restore </a> &nbsp; &nbsp; 
			<a href=deleteProdukForever.php?id=".$row['id_produk']."> delete </a> </td>
              </tr>";
        $no++;
    }
    ?>
</table>