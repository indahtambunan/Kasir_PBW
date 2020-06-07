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

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Tambah Barang
                </h2>
            </div>
            <div class="body">
                <form method="POST">

            	   <label for="">Kode</label>
                    <div class="form-group">
                        <div class="form-line">
                        	<input type="text" name="kode" class="form-control"/>
                        </div>
                    </div>

                    <label for="">Nama Barang</label>
                    <div class="form-group">
                        <div class="form-line">
                        	<input type="text" name="nama" class="form-control"/>
                        </div>
                    </div>

                    <label for="">Satuan</label>
                    <div class="form-group">
                        <div class="form-line">
                            <select name="satuan" class="form-control show-tick">
                                <option value="">-- Pilih Satuan--</option>
                                <option value="Pack">Pack</option>
                                <option value="Pcs">Pcs</option>
                                <option value="Lusin">Lusin</option>
                                <option value="Kodi">Kodi</option>
                                <option value="Rim">Rim</option>
                            </select>
                    	</div>
    				</div>

                    <label for="">Harga Beli</label>
                    <div class="form-group">
                        <div class="form-line">
                        	<input type="number" name="harga_beli" id="harga_beli" onkeyup="sum()" class="form-control"/>
                        </div>
                    </div>

                    <label for="">Stok</label>
                    <div class="form-group">
                        <div class="form-line">
                        	<input type="number" name="stok" class="form-control"/>
                        </div>
                    </div>

                    <label for="">Harga Jual</label>
                    <div class="form-group">
                        <div class="form-line">
                        	<input type="number" name="harga_jual" id="harga_jual" onkeyup="sum()" class="form-control"/>
                        </div>
                    </div>

                    <label for="">Profit</label>
                    <div class="form-group">
                        <div class="form-line">
                        	<input type="number" name="profit" id="profit" readonly="" style="background-color: #e7e3e9;" value="0" class="form-control"/>
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

		$sql = $koneksi->query("insert into barang values('$kode', '$nama', '$satuan', '$harga_beli', '$stok', '$harga_jual', '$profit')");

		if ($sql) {
			?>
				<script type="text/javascript">
					alert("Data Berhasil Disimpan");
					window.location.href="?page=barang";
				</script>
			<?php
		}

	}

?>