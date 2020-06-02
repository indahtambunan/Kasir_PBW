<?php 

    $id = $_GET['id'];
    $sql2 = $koneksi->query("select * from user where id='$id'");
    $tampil = $sql2->fetch_assoc();
    $level = $tampil['level'];

 ?>

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Ubah Pengguna
                            </h2>

                        </div>

                        <div class="body">

                        <form method="POST" enctype="multipart/form-data">

                        	<label for="">Nama</label>
                            <div class="form-group">
                                <div class="form-line">
                                	<input type="text" name="nama_pengguna" value="<?php echo $tampil['nama_pengguna']; ?>" class="form-control"/>
                                </div>
                            </div>

                            <label for="">Username</label>
                            <div class="form-group">
                                <div class="form-line">
                                	<input type="text" name="username" value="<?php echo $tampil['username']; ?>" class="form-control"/>
                                </div>
                            </div>


                           <!--  <label for="">Password</label>
                            <div class="form-group">
                                <div class="form-line">
                                	<input type="password" name="password" class="form-control"/>
                                </div>
                            </div> -->

                            <label for="">Level</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select name="level" class="form-control show-tick">
                                        <option value="admin" <?php if ($level=='admin') {echo "selected"; } ?>>Admin</option>
                                        <option value="kasir" <?php if ($level=='kasir') {echo "selected"; } ?>>Kasir</option>
                                    </select>
                                </div>
                            </div>

                            <label for="">Foto</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <img src="images/<?php echo $tampil['foto']; ?>" width="100" height="100" alt="">
                                </div>
                            </div>

                            <label for="">Ganti Foto</label>
                            <div class="form-group">
                                <div class="form-line">
                                	<input type="file" name="foto" class="form-control"/>
                                </div>
                            </div>

                            <input type="submit" name="simpan" value="simpan" class="btn btn-primary">

                        </form>

    <?php 

    	if (isset($_POST['simpan'])) {
    		
    		$nama_pengguna = $_POST['nama_pengguna'];
    		$username = $_POST['username'];
    		// $password = $_POST['password'];
    		$level = $_POST['level'];
            $foto = $_FILES['foto']['name'];
            $lokasi = $_FILES['foto']['tmp_name'];

            if (!empty($lokasi)) {
            $upload = move_uploaded_file($lokasi, "images/".$foto);
                
            


    		$sql = $koneksi->query("update user set nama_pengguna='$nama_pengguna', username='$username', level='$level', foto='$foto' where id='$id'");

    		if ($sql) {
    			?>

    				<script type="text/javascript">
    					alert("Data Berhasil Diubah");
    					window.location.href="?page=pengguna";
    				</script>

    			<?php
    		}

    	}else{
                
            


            $sql = $koneksi->query("update user set nama_pengguna='$nama_pengguna', username='$username', level='$level' where id='$id'");

            if ($sql) {
                ?>

                    <script type="text/javascript">
                        alert("Data Berhasil Diubah");
                        window.location.href="?page=pengguna";
                    </script>

                <?php
            }

    }
}

    ?>