<?php 
    
    $kode = $_GET['kode_penjualan'];
    $kasir = $data['nama_pengguna'];

 ?>

<div class="row clearfix">

                        <div class="body">

                            <form method="POST">

                                <!-- kode penjualan -->
                                <div class="col-md-2">
                                    <input type="text" name="kode" value="<?php echo $kode; ?>" class="form-control" readonly="" />
                                </div>

                                <!-- kode bar -->
                                <div class="col-md-2">
                                    <input type="text" name="kode_barcode" class="form-control" autofocus="" />
                                </div>

                                <div class="col-md-2">
                                    <input type="submit" name="simpan" value="Masukkan" class="btn btn-primary">
                                </div>

                            </form>

                        </div>
<?php 

    if (isset($_POST['simpan'])) {
        $date = date("Y-m-d");
        $kode_p = $_POST['kode'];
        $bar = $_POST['kode_barcode'];
        $barang = $koneksi->query("select * from barang where kode = '$bar'");
        $data_barang = $barang->fetch_assoc();
        $harga_jual  = $data_barang['harga_jual'];
        $jumlah = 1;
        $total = $jumlah * $harga_jual;
        $barang2 = $koneksi->query("select * from barang where kode = '$bar'");

        while ($data_barang2 = $barang2->fetch_assoc()) {
            $sisa = $data_barang2['stok'];

            if ($sisa == 0) {
                ?>

                    <script type="text/javascript">
                        alert("Stok Barang Habis");
                        window.location.href="?page=penjualan&kode_penjualan=<?php echo $kode; ?>"
                    </script>

                <?php
            }

            else{
                $koneksi->query("insert into penjualan (kode_barcode, kode_penjualan, jumlah, total, tgl_penjualan)values('$bar', '$kode_p', '$jumlah', '$total', '$date')");
            }
        }

    }

 ?>
 <br><br>
 <form method="POST">
    <div class="col-md-2">
        <label for="">Pelanggan</label>
        <select name="pelanggan" class="form-control show-tick">
            <?php 
                $pelanggan = $koneksi->query("select * from pelanggan order by kode_pelanggan");
                while ($data_pelanggan = $pelanggan->fetch_assoc()) {
                    echo "
                        <option value = '$data_pelanggan[kode_pelanggan]'>$data_pelanggan[nama_pelanggan]</option>
                    ";
                }
             ?>
            
        </select>
        
    </div>

 <br><br><br><br>

             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Daftar Barang Belanja 
                            </h2>

                        </div>
                        <div class="body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barcode</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>


                                <tbody>

                                    <?php

                                        $no = 1;
                                        $sql = $koneksi->query("select * from penjualan, barang where penjualan.kode_barcode=barang.kode AND kode_penjualan='$kode'");
                                        while ($data = $sql->fetch_assoc()) {
                                            
                                        

                                    ?>

                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['kode_barcode']; ?></td>
                                        <td><?php echo $data['nama_barang']; ?></td>
                                        <td><?php echo $data['harga_jual']; ?></td>
                                        <td><?php echo $data['jumlah']; ?></td>
                                        <td><?php echo $data['total']; ?></td>
                                        <td>
                                            
                                            <a href="?page=penjualan&aksi=tambah&id=<?php echo $data['id']?>&kode_pj=<?php echo $data['kode_penjualan'] ?>&harga_jual=<?php echo $data['harga_jual']?>&kode_b=<?php echo $data['kode_barcode'] ?>" title="tambah" class="btn btn-success" ><i class="material-icons">add</i></a>

                                            <a href="?page=penjualan&aksi=kurang&id=<?php echo $data['id']?>&kode_pj=<?php echo $data['kode_penjualan'] ?>&harga_jual=<?php echo $data['harga_jual']?>&kode_b=<?php echo $data['kode_barcode'] ?>" title="kurang" class="btn btn-success" ><i class="material-icons">remove</i></a>

                                            <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" href="?page=penjualan&aksi=hapus&id=<?php echo $data['id']?>&kode_pj=<?php echo $data['kode_penjualan'] ?>&harga_jual=<?php echo $data['harga_jual']?>&kode_b=<?php echo $data['kode_barcode']?>&jumlah=<?php echo $data['jumlah']; ?>" title="hapus" class="btn btn-danger" ><i class="material-icons">clear</i></a>

                                        </td>
                                    </tr>  

                                    <?php 

                                            $total_bayar = $total_bayar+$data['total'];

                                        } 
                                    ?>

                                </tbody>

                                <tr>
                                    <th colspan="5" style="text-align: right;">Total</th>
                                    <td><input type="number" readonly="" style="text-align: right;" name="total" id="total" onkeyup="hitung();" value="<?php echo $total_bayar; ?>" ></td>
                                </tr>

                                <tr>
                                    <th colspan="5" style="text-align: right;">Diskon</th>
                                    <td><input type="number" style="text-align: right;" onkeyup="hitung();" name="diskon" id="diskon"></td>
                                </tr>

                                <tr>
                                    <th colspan="5" style="text-align: right;">Potongan Diskon</th>
                                    <td><input type="number" style="text-align: right;" name="potongan" id="potongan"></td>
                                </tr>

                                <tr>
                                    <th colspan="5" style="text-align: right;">Subtotal</th>
                                    <td><input type="number" style="text-align: right;" name="subtotal" id="subtotal" ></td>
                                </tr>

                                <tr>
                                    <th colspan="5" style="text-align: right;">Bayar</th>
                                    <td><input type="number" style="text-align: right;" onkeyup="hitung();" name="bayar" id="bayar" ></td>
                                </tr>

                                <tr>
                                    <th colspan="5" style="text-align: right;">Kembali</th>
                                    <td><input type="number" style="text-align: right;" name="kembali" id="kembali">

                                        <input type="submit" name="simpan_penjualan" value="simpan" class="btn btn-info">

                                        <input type="submit" value="cetak" class="btn btn-success" onclick="window.open('page/penjualan/cetak.php?kode_pj=<?php echo $kode; ?>&kasir=<?php echo $kasir; ?>','mywindow','width=600px, height=600px, left=300px;')">
                                    </td>
                                </tr>
                            </table>
                            
                        </div>
                    </form>

                    <?php 
                        if (isset($_POST['simpan_penjualan'])) {
                            $pelanggan = $_POST['pelanggan'];
                            $total = $_POST['total'];
                            $diskon = $_POST['diskon'];
                            $potongan = $_POST['potongan'];
                            $subtotal = $_POST['subtotal'];
                            $bayar = $_POST['bayar'];
                            $kembali = $_POST['kembali'];

                            $koneksi->query("insert into penjualan_detail(kode_penjualan, bayar, kembali, diskon, potongan, total) values('$kode', '$bayar', '$kembali', '$diskon', '$potongan', '$subtotal')");

                            $koneksi->query("update penjualan set id_pelanggan = '$pelanggan' where kode_penjualan='$kode'");
                        }
                     ?>


<script type="text/javascript">
    function hitung(){
        var total_bayar = document.getElementById('total').value;
        var diskon = document.getElementById('diskon').value;
        var potongan_diskon = parseInt(total_bayar) * parseInt(diskon) / parseInt(100);
        if (!isNaN(potongan_diskon)) {
            var potongan = document.getElementById('potongan').value = potongan_diskon;
        }

        var subtotal = parseInt(total_bayar) - parseInt(potongan);
        if (!isNaN(subtotal)) {
            var sub_total = document.getElementById('subtotal').value = subtotal;
        }

        var bayar = document.getElementById('bayar').value;
        var bayarnya = parseInt(bayar) - parseInt(sub_total);
        if (!isNaN(bayarnya)) {
            document.getElementById('kembali').value = bayarnya;
        }

}
</script>