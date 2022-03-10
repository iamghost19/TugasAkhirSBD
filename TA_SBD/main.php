<?php
include_once("config.php");
?>

<h2>Main page</h2>
<p><a href=searchItem.php?>Search Item </a></p>
<p>List Suplier</p>
<a href="addSuplier.php">Tambah Suplier</a>
<table border="1">
    <tr><th>no</th><th>nama suplier<th>aksi</th></tr>
    <?php
	$suplier = mysqli_query($mysqli, "SELECT * FROM suplier WHERE
is_delete=0 ORDER BY id_suplier DESC");
    $no=1;
     while($row =mysqli_fetch_array($suplier)){
           echo '<tr>';
            echo '<td>' . $no. '</td>';
            echo '<td>' . $row['nama_suplier'] . '</td>';
            echo '<td><a href="editSuplier.php?id=' . $row['id_suplier'] . '">Edit</a> | <a onclick="return confirm(\'Are you sure you want to delete this item?\');" href="deleteSuplier.php?id=' . $row['id_suplier'] . '">Delete</a></td></tr>';
        $no++;
    }
    ?>
</table>

<p>List kategori</p>
<a href="addKategori.php">Tambah Kategori</a>
<table border="1">
    <tr><th>no</th><th>nama kategori</th><th>aksi</th></tr>
    <?php
	$kategori = mysqli_query($mysqli, "SELECT * FROM kategori WHERE
is_delete=0 ORDER BY id_kategori DESC");
    $no=1;
     while($row =mysqli_fetch_array($kategori)){
          echo '<tr>';
            echo '<td>' . $no. '</td>';
            echo '<td>' . $row['kategori_produk'] . '</td>';
            echo '<td><a href="editKategori.php?id=' . $row['id_kategori'] . '">Edit</a> | <a onclick="return confirm(\'Are you sure you want to delete this item?\');" href="deleteKategori.php?id=' . $row['id_kategori'] . '">Delete</a></td></tr>';
        $no++;
    }
    ?>
</table>
<table border="1">
</table>

<p>List Produk</p>
<a href="addProduk.php">Tambah Produk</a>
<table border="1">
  <tr><th>no</th><th>nama produk</th><th>kategori produk</th><th>nama suplier</th><th>stok</th><th>harga</th><th>aksi</th></tr>
    <?php
	$produk = mysqli_query($mysqli, "SELECT a.id_produk, A.nama_produk, a.stok_produk, a.harga_produk, b.kategori_produk, c.nama_suplier 
	from produk A 
	INNER JOIN kategori B 
	ON A.id_kategori = B.id_kategori 
	INNER JOIN suplier C
	ON A.id_suplier = C.id_suplier 
    WHERE a.is_delete=0 ORDER BY id_produk DESC");
    $no=1;
     while($row =mysqli_fetch_array($produk)){
        echo '<tr>';
            echo '<td>' . $no. '</td>';
            echo '<td>' . $row['nama_produk'] . '</td>';
		    echo '<td>' . $row['kategori_produk'] . '</td>';
		    echo '<td>' . $row['nama_suplier'] . '</td>';
		    echo '<td>' . $row['stok_produk'] . '</td>';
            echo '<td>' . $row['harga_produk'] . '</td>';
            echo '<td><a href="editProduk.php?id=' . $row['id_produk'] . '">Edit</a> | <a onclick="return confirm(\'Are you sure you want to delete this item?\');" href="deleteProduk.php?id=' . $row['id_produk'] . '">Delete</a></td></tr>';
        $no++;
    }
    ?>
</table>
<table border="1">
</table>
<p><a href=deleteTemp.php?>recycle bin</p>
