<?php 
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	$koneksi = new mysqli("localhost", "root", "", "db_pos");
 ?>

 <style>
 	@media print{
 		input.Print{
 			display: none;
 		}
 	}
 </style>

<table border="1" width="100%" style="border-collapse: collapse;">
	<caption>Laporan Penjualan Barang</caption>
	<thead>
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>Kode Barcode</th>
			<th>Nama Barang</th>
			<th>Harga Jual</th>
			<th>Jumlah</th>
			<th>Total</th>
			<th>Profit</th>
		</tr>
	</thead>
	<tbody>
		<?php

			$tanggal_awal 	= $_POST['tanggal_awal'];
			$tanggal_akhir 	= $_POST['tanggal_akhir'];

                $no 	= 1;
                $sql 	= $koneksi->query("select * from penjualan, barang where penjualan.kode_barcode=barang.kode and tgl_penjualan between '$tanggal_awal' and '$tanggal_akhir'");

                while ($data = $sql->fetch_assoc()) {
                    $profit = $data['profit']*$data['jumlah'];
            ?>

            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo date('d F Y', strtotime($data['tgl_penjualan'])) ?></td>
                <td><?php echo $data['kode']; ?></td>
                <td><?php echo $data['nama_barang']; ?></td>
                <td><?php echo number_format($data['harga_jual']) ?></td>
                <td><?php echo $data['jumlah']; ?></td>
                <td><?php echo number_format($data['total']) ?></td>
                <td><?php echo number_format($profit) ?></td>    
            </tr>  

            <?php 
            	$total_penjualan 	= $total_penjualan+$data['total'];
            	$total_profit 		= $total_profit+$profit;

        	} 
        	?>

	</tbody>
	<tr>
		<th colspan="6">Total</th>
		<td><?php echo number_format($total_penjualan); ?></td>
		<td><?php echo number_format($total_profit); ?></td>
	</tr>
</table>
<br>
<input type="button" class="Print" value="print" onclick="window.print()">