<?php 
	$jumlah = $_GET['jumlah'];
	$id = $_GET['id'];
	$kode_pj = $_GET['kode_pj'];
	$harga_jual = $_GET['harga_jual'];
	$kode_b = $_GET['kode_b'];

	$sql = $koneksi->query("delete from penjualan where id ='$id'");
	$sql3 = $koneksi->query("update barang set stok=(stok + $jumlah) where kode_barcode='$kode_b'");

	if ($sql || $sql2 || $sql3) {
		?>
		<script>
			window.location.href="?page=penjualan&kode_penjualan=<?php echo $kode_pj ?>";
		</script>
		<?php
	}

 ?>