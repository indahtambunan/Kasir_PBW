<?php 
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	$koneksi = new mysqli("localhost", "root", "", "db_pos");
	$kasir = $_GET['kasir'];
	$kode_pj = $_GET['kode_pj'];

 ?>

 <h4>NOTA BELANJA</h4>
 <table>
 	<tr>
 		<td>Toko Kita</td>
 	</tr>
 	<tr>
 		<td>Jl. Riau No. 16 Jember</td>
 	</tr>
 </table>
 <table>
 	<?php 
 		$sql = $koneksi->query("select * from penjualan, pelanggan where penjualan.id_pelanggan=pelanggan.kode_pelanggan and kode_penjualan='$kode_pj'");
 		$tampil = $sql->fetch_assoc();
 	 ?>

 	 <tr>
 	 	<td>Kode Penjualan &nbsp&nbsp</td>
 	 	<td>: &nbsp&nbsp <?php echo $tampil['kode_penjualan']; ?></td>
 	 </tr>

 	 <tr>
 	 	<td>Tanggal Penjualan &nbsp&nbsp</td>
 	 	<td>: &nbsp&nbsp <?php echo $tampil['tgl_penjualan']; ?></td>
 	 </tr>

 	 <tr>
 	 	<td>Pelanggan &nbsp&nbsp</td>
 	 	<td>: &nbsp&nbsp <?php echo $tampil['nama_pelanggan']; ?></td>
 	 </tr>

 	 <tr>
 	 	<td>Kasir &nbsp&nbsp</td>
 	 	<td>: &nbsp&nbsp <?php echo $kasir ?></td>
 	 </tr>

 	 <td><hr></td>

 	 <?php 
 	 	$sql2 = $koneksi->query("select * from penjualan, penjualan_detail, barang where penjualan.kode_penjualan=penjualan_detail.kode_penjualan and penjualan.kode_barcode=barang.kode and penjualan.kode_penjualan='$kode_pj'");

 	 	while ($tampil2 = $sql2->fetch_assoc()) {
 	 ?>

	<tr>
 	 	<td><?php echo $tampil2['nama_barang']; ?></td>
 	 	<td><?php echo number_format($tampil2['harga_jual']).',-'.'&nbsp'.'&nbsp'.'X'.'&nbsp'.'&nbsp'.$tampil2['jumlah'].'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp' ?></td>
 	 	<td><?php echo number_format($tampil2['total']).',-'; ?></td>
 	 </tr> 	 

 	<?php 

 		$diskon = $tampil2['diskon'];
 		$potongan = $tampil2['potongan'];
 		$bayar = $tampil2['bayar'];
 		$kembali = $tampil2['kembali'];
 		$total = $tampil2['total'];
 		$total_bayar = $total_bayar + $tampil2['total'];
 	} 

 	?>

 	<tr>
 		<td><hr></td>
 	</tr>

 	<tr>
 		<th colspan="2">Total</th>
 		<td>: <?php echo $total_bayar; ?></td>
 	</tr>
 	<tr>
 		<th colspan="2">Diskon</th>
 		<td>: <?php echo $diskon; ?></td>
 	</tr>
 	<tr>
 		<th colspan="2">Potongan</th>
 		<td>: <?php echo $potongan; ?></td>
 	</tr>
 	<tr>
 		<th colspan="2">Subtotal</th>
 		<td>: <?php echo $total; ?></td>
 	</tr>
 	<tr>
 		<th colspan="2">Bayar</th>
 		<td>: <?php echo $bayar; ?></td>
 	</tr>
 	<tr>
 		<th colspan="2">Kembali</th>
 		<td>: <?php echo $kembali; ?></td>
 	</tr>
 </table>
 <table>
 	<tr>
 		<td>Barang yang sudah dibeli tidak dapat dikembalikan</td>
 	</tr>
 </table>
 <br>
 <input type="button" value="print" onclick="window.print()">