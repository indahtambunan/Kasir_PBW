<?php 
    
    $kode = $_GET['id'];

    $sql = $koneksi->query("select * from pelanggan where kode_pelanggan = '$kode'");
    $tampil = $sql->fetch_assoc();

?>

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Ubah Pelanggan
                            </h2>

                        </div>

                        <div class="body">

                        <form method="POST">

                            <label for="">Nama</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="nama_pelanggan" value="<?php echo $tampil['nama_pelanggan'] ?>" class="form-control"/>
                                </div>
                            </div>

                            <label for="">Alamat</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="alamat_pelanggan" value="<?php echo $tampil['alamat_pelanggan'] ?>" class="form-control"/>
                                </div>
                            </div>


                            <label for="">Telepon</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" name="telepon_pelanggan" value="<?php echo $tampil['telepon_pelanggan'] ?>" class="form-control"/>
                                </div>
                            </div>

                            <label for="">Email</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="email_pelanggan" value="<?php echo $tampil['email_pelanggan'] ?>" class="form-control"/>
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


            $sql = $koneksi->query("update pelanggan set nama_pelanggan='$nama_pelanggan', alamat_pelanggan='$alamat_pelanggan', telepon_pelanggan='$telepon_pelanggan', email_pelanggan='$email_pelanggan' where kode_pelanggan='$kode'");

            if ($sql) {
                ?>

                    <script type="text/javascript">
                        alert("Data Berhasil Diubah");
                        window.location.href="?page=pelanggan";
                    </script>

                <?php
            }

        }

    ?>