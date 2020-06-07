<script>
function sum() {
	var harga_beli = document.getElementById('harga_beli').value;
	var harga_jual = document.getElementById('harga_jual').value;
	var result = parseInt(harga_jual) - parseInt(harga_beli);
	if (!isNaN(result)) {
		document.getElementById('profit').value = result;
	}
}
</script>

<?php 
	$kode2 = $_GET['id'];
	$sql = $koneksi->query("select * from barang where kode = '$kode2'");
	$tampil = $sql->fetch_assoc();
	$satuan = $tampil['satuan'];
?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Ubah Barang
                </h2>
            </div>
            <div class="body">
                <form method="POST">

                	<label for="">Kode</label>
                    <div class="form-group">
                        <div class="form-line">
                        	<input type="text" name="kode" value="<?php echo $tampil['kode']; ?>" class="form-control"/>
                        </div>
                    </div>

                    <label for="">Nama Barang</label>
                    <div class="form-group">
                        <div class="form-line">
                        	<input type="text" name="nama" value="<?php echo $tampil['nama_barang']; ?>" class="form-control"/>
                        </div>
                    </div>

                    <label for="">Satuan</label>
                    <div class="form-group">
                        <div class="form-line">
                            <select name="satuan" class="form-control show-tick">
                                <!-- <option value="">-- Pilih Satuan--</option> -->
                                <option value="Pack" <?php if ($satuan=='Pack') {echo "selected"; } ?> >Pack</option>
                                <option value="Pcs" <?php if ($satuan=='Pcs') {echo "selected"; } ?>>Pcs</option>
                                <option value="Lusin" <?php if ($satuan=='Lusin') {echo "selected"; } ?>>Lusin</option>
                                <option value="Kodi" <?php if ($satuan=='Kodi') {echo "selected"; } ?>>Kodi</option>
                                <option value="Rim" <?php if ($satuan=='Rim') {echo "selected"; } ?>>Rim</option>
                            </select>
                    	</div>
    				</div>

                    <label for="">Harga Beli</label>
                    <div class="form-group">
                        <div class="form-line">
                        	<input type="number" name="harga_beli" id="harga_beli" onkeyup="sum()" value="<?php echo $tampil['harga_beli']; ?>" class="form-control"/>
                        </div>
                    </div>

                    <label for="">Stok</label>
                    <div class="form-group">
                        <div class="form-line">
                        	<input type="number" name="stok" value="<?php echo $tampil['stok']; ?>" class="form-control"/>
                        </div>
                    </div>

                    <label for="">Harga Jual</label>
                    <div class="form-group">
                        <div class="form-line">
                        	<input type="number" name="harga_jual" id="harga_jual" onkeyup="sum()" value="<?php echo $tampil['harga_jual']; ?>" class="form-control"/>
                        </div>
                    </div>

                    <label for="">Profit</label>
                    <div class="form-group">
                        <div class="form-line">
                        	<input type="number" name="profit" id="profit" value="<?php echo $tampil['profit']; ?>" readonly="" style="background-color: #e7e3e9;" value="0" class="form-control"/>
                        </div>
                    </div>

                    <input type="submit" name="simpan" value="simpan" class="btn btn-primary">

                </form>

<?php 

	if (isset($_POST['simpan'])) {
		$kode = $_POST['kode'];
		$nama = $_POST['nama'];
		$satuan = $_POST['satuan'];
		$harga_beli = $_POST['harga_beli'];
		$stok = $_POST['stok'];
		$harga_jual = $_POST['harga_jual'];
		$profit = $_POST['profit'];

		$sql2 = $koneksi->query("update barang set kode='$kode', nama_barang='$nama', satuan='$satuan', harga_beli='$harga_beli', stok='$stok', harga_jual='$harga_jual', profit='$profit' where kode='$kode2'");

		if ($sql2) {
			?>
				<script type="text/javascript">
					alert("Data Berhasil Diubah");
					window.location.href="?page=barang";
				</script>
			<?php
		}

	}

?>