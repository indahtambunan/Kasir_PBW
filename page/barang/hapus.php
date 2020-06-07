<?php 
	
	$kode2 = $_GET['id'];
	$sql = $koneksi->query("delete from barang where kode = '$kode2'");

if ($sql) {	
?>
	<script type="text/javascript">
    	alert("Data Berhasil Dihapus");
    	window.location.href="?page=barang";
   	</script>

<?php } ?>