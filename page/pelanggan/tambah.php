<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Tambah Pelanggan
                            </h2>

                        </div>

                        <div class="body">

                        <form method="POST">

                        	<label for="">Nama</label>
                            <div class="form-group">
                                <div class="form-line">
                                	<input type="text" name="nama_pelanggan" class="form-control"/>
                                </div>
                            </div>

                            <label for="">Alamat</label>
                            <div class="form-group">
                                <div class="form-line">
                                	<input type="text" name="alamat_pelanggan" class="form-control"/>
                                </div>
                            </div>


                            <label for="">Telepon</label>
                            <div class="form-group">
                                <div class="form-line">
                                	<input type="number" name="telepon_pelanggan" class="form-control"/>
                                </div>
                            </div>

                            <label for="">Email</label>
                            <div class="form-group">
                                <div class="form-line">
                                	<input type="text" name="email_pelanggan" class="form-control"/>
                                </div>
                            </div>

                            <input type="submit" name="simpan" value="simpan" class="btn btn-primary">

                        </form>

    <?php 

    	if (isset($_POST['simpan'])) {
    		
    		$nama_pelanggan = $_POST['nama_pelanggan'];
    		$alamat_pelanggan = $_POST['alamat_pelanggan'];
    		$telepon_pelanggan = $_POST['telepon_pelanggan'];
    		$email_pelanggan = $_POST['email_pelanggan'];


    		$sql = $koneksi->query("insert into pelanggan(nama_pelanggan, alamat_pelanggan, telepon_pelanggan, email_pelanggan) values('$nama_pelanggan', '$alamat_pelanggan', '$telepon_pelanggan', '$email_pelanggan')");

    		if ($sql) {
    			?>

    				<script type="text/javascript">
    					alert("Data Berhasil Disimpan");
    					window.location.href="?page=pelanggan";
    				</script>

    			<?php
    		}

    	}

    ?>